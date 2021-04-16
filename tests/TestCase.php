<?php

namespace Myckhel\ChatSystem\Tests;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
  public function setUp(): void
  {
    $this->loadEnvironmentVariables();

    parent::setUp();

    $this->setUpDatabase($this->app);

    $this->setUpTempTestFiles();

    $this->assertTrue(true);
    //
    // $this->testModel = TestModel::first();
    // $this->testUnsavedModel = new TestModel();
    // $this->testModelWithConversion = TestModelWithConversion::first();
    // $this->testModelWithConversionQueued = TestModelWithConversionQueued::first();
    // $this->testModelWithoutMediaConversions = TestModelWithoutMediaConversions::first();
    // $this->testModelWithMorphMap = TestModelWithMorphMap::first();
    // $this->testModelWithResponsiveImages = TestModelWithResponsiveImages::first();
    // $this->testModelWithConversionsOnOtherDisk = TestModelWithConversionsOnOtherDisk::first();
  }
}
