<?php

namespace Binkode\ChatSystem\Tests;

use Binkode\ChatSystem\ChatSystem;
use Binkode\ChatSystem\ChatSystemServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Binkode\ChatSystem\Tests\Models\User;
use Binkode\ChatSystem\Database\Seeders\ConversationSeeder;
use Illuminate\Encryption\Encrypter;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestCase extends Orchestra
{
  protected function setUp(): void
  {
    parent::setUp();

    $this->setUpDatabase();

    Factory::guessFactoryNamesUsing(
      fn(string $modelName) => 'Binkode\\ChatSystem\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
    );

    ChatSystem::registerObservers();

    $this->seed(ConversationSeeder::class);
  }

  protected function getPackageProviders($app)
  {
    return [
      ChatSystemServiceProvider::class,
    ];
  }

  public function getEnvironmentSetUp($app)
  {
    config()->set('database.default', 'testing');

    config()->set('auth.providers.users.model', User::class);
    config()->set('chat-system.models.user', User::class);
    config()->set('app.debug', true);
    config()->set('app.key', 'base64:' . base64_encode(
      Encrypter::generateKey(config()['app.cipher'])
    ));
  }

  protected function setUpDatabase()
  {
    $this->migrateTables();

    $this->createTables(User::class);
    $this->seedModels(User::class);
  }

  protected function createTables(...$modelClasses)
  {
    collect($modelClasses)->each(
      fn(string $modelClass) => $modelClass::up()
    );
  }

  protected function seedModels(...$modelClasses)
  {
    collect($modelClasses)->each(function (string $modelClass) {
      foreach (range(10, 0) as $index) {
        $modelClass::create(['name' => "name {$index}"]);
      }
    });
  }

  protected function migrateTables()
  {
    require_once __DIR__ . '/../database/migrations/2021_03_08_192416_create_conversations_table.php';
    require_once __DIR__ . '/../database/migrations/2021_03_08_192914_create_conversation_users_table.php';
    require_once __DIR__ . '/../database/migrations/2021_03_08_193929_create_messages_table.php';
    require_once __DIR__ . '/../database/migrations/2021_03_08_194910_create_chat_events_table.php';

    (new \CreateConversationsTable())->up();
    (new \CreateConversationUsersTable())->up();
    (new \CreateMessagesTable())->up();
    (new \CreateChatEventsTable())->up();
  }
}
