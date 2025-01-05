"use strict";(self.webpackChunkdocs=self.webpackChunkdocs||[]).push([[7591],{5680:(e,n,t)=>{t.d(n,{xA:()=>u,yg:()=>p});var r=t(6540);function o(e,n,t){return n in e?Object.defineProperty(e,n,{value:t,enumerable:!0,configurable:!0,writable:!0}):e[n]=t,e}function a(e,n){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);n&&(r=r.filter((function(n){return Object.getOwnPropertyDescriptor(e,n).enumerable}))),t.push.apply(t,r)}return t}function s(e){for(var n=1;n<arguments.length;n++){var t=null!=arguments[n]?arguments[n]:{};n%2?a(Object(t),!0).forEach((function(n){o(e,n,t[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):a(Object(t)).forEach((function(n){Object.defineProperty(e,n,Object.getOwnPropertyDescriptor(t,n))}))}return e}function i(e,n){if(null==e)return{};var t,r,o=function(e,n){if(null==e)return{};var t,r,o={},a=Object.keys(e);for(r=0;r<a.length;r++)t=a[r],n.indexOf(t)>=0||(o[t]=e[t]);return o}(e,n);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);for(r=0;r<a.length;r++)t=a[r],n.indexOf(t)>=0||Object.prototype.propertyIsEnumerable.call(e,t)&&(o[t]=e[t])}return o}var l=r.createContext({}),c=function(e){var n=r.useContext(l),t=n;return e&&(t="function"==typeof e?e(n):s(s({},n),e)),t},u=function(e){var n=c(e.components);return r.createElement(l.Provider,{value:n},e.children)},h="mdxType",d={inlineCode:"code",wrapper:function(e){var n=e.children;return r.createElement(r.Fragment,{},n)}},m=r.forwardRef((function(e,n){var t=e.components,o=e.mdxType,a=e.originalType,l=e.parentName,u=i(e,["components","mdxType","originalType","parentName"]),h=c(t),m=o,p=h["".concat(l,".").concat(m)]||h[m]||d[m]||a;return t?r.createElement(p,s(s({ref:n},u),{},{components:t})):r.createElement(p,s({ref:n},u))}));function p(e,n){var t=arguments,o=n&&n.mdxType;if("string"==typeof e||o){var a=t.length,s=new Array(a);s[0]=m;var i={};for(var l in n)hasOwnProperty.call(n,l)&&(i[l]=n[l]);i.originalType=e,i[h]="string"==typeof e?e:o,s[1]=i;for(var c=2;c<a;c++)s[c]=t[c];return r.createElement.apply(null,s)}return r.createElement.apply(null,t)}m.displayName="MDXCreateElement"},4842:(e,n,t)=>{t.r(n),t.d(n,{contentTitle:()=>s,default:()=>h,frontMatter:()=>a,metadata:()=>i,toc:()=>l});var r=t(8168),o=(t(6540),t(5680));const a={id:"configure",title:"ChatSystem configuration",sidebar_label:"Configuring ChatSystem",slug:"/guides/configure"},s=void 0,i={unversionedId:"guides/configure",id:"version-v1.0-alpha.3/guides/configure",isDocsHomePage:!1,title:"ChatSystem configuration",description:"Publish config file",source:"@site/versioned_docs/version-v1.0-alpha.3/guides/configure.md",sourceDirName:"guides",slug:"/guides/configure",permalink:"/laravel-chat-system/docs/v1.0-alpha.3/guides/configure",editUrl:"https://github.com/binkode/laravel-chat-system-docs/edit/master/versioned_docs/version-v1.0-alpha.3/guides/configure.md",version:"v1.0-alpha.3",frontMatter:{id:"configure",title:"ChatSystem configuration",sidebar_label:"Configuring ChatSystem",slug:"/guides/configure"},sidebar:"version-v1.0-alpha.3/docs",previous:{title:"Requirements",permalink:"/laravel-chat-system/docs/v1.0-alpha.3/requirements"},next:{title:"Using Providers",permalink:"/laravel-chat-system/docs/v1.0-alpha.3/guides/providers"}},l=[{value:"Publish config file",id:"publish-config-file",children:[]}],c={toc:l},u="wrapper";function h(e){let{components:n,...t}=e;return(0,o.yg)(u,(0,r.A)({},c,t,{components:n,mdxType:"MDXLayout"}),(0,o.yg)("h2",{id:"publish-config-file"},"Publish config file"),(0,o.yg)("p",null,"publish the config file if not published"),(0,o.yg)("pre",null,(0,o.yg)("code",{parentName:"pre",className:"language-bash"},"php artisan vendor:publish --provider=\"Myckhel\\ChatSystem\\ChatSystemServiceProvider\" --tag='config'\n")),(0,o.yg)("pre",null,(0,o.yg)("code",{parentName:"pre",className:"language-php"},'\nreturn [\n  /*\n  * ChatSystem Models\n  */\n  "models" => [\n    /*\n    * The model you want to use as a User model needs to implement the\n    * `Myckhel\\ChatSystem\\Contracts\\ChatEventMaker` contract.\n    */\n    "user"                => "App\\\\Models\\\\User",\n    \n    /*\n    * The model you want to use as a Conversation model needs to implement the\n    * `Myckhel\\ChatSystem\\Contracts\\IConversation` contract.\n    */\n    "conversation"        => Myckhel\\ChatSystem\\Models\\Conversation::class,\n    \n    /*\n    * The model you want to use as a ConversationUser model needs to implement the\n    * `Myckhel\\ChatSystem\\Contracts\\IConversationUser` contract or extends the\n    * `Myckhel\\ChatSystem\\Models\\ConversationUser`\n    */\n    "conversation_user"   => Myckhel\\ChatSystem\\Models\\ConversationUser::class,\n    \n    /*\n    * The model you want to use as a Message model needs to implement the\n    * `Myckhel\\ChatSystem\\Contracts\\IMessage` contract or extends the\n    * `Myckhel\\ChatSystem\\Models\\Message`\n    */\n    "message"             => Myckhel\\ChatSystem\\Models\\Message::class,\n    \n    /*\n    * The model you want to use as a ChatEvent model needs to implement the\n    * `Myckhel\\ChatSystem\\Contracts\\IChatEvent` contract or extends the\n    * `Myckhel\\ChatSystem\\Models\\ChatEvent`\n    */\n    "chat_event"          => Myckhel\\ChatSystem\\Models\\ChatEvent::class,\n  ],\n\n  /*\n  * ChatSystem Routes\n  * Change if you want to add middleware or prefix to\n  * chatSystem routes.\n  */\n  "route" => [\n    "middlewares" => [\'api\'],\n    "prefix"      => \'api\'\n  ],\n\n  /*\n  * Events Queues\n  * Change if you want to rename the broadcast queue\n  */\n  "queues" => [\n    "events" => [\n      "message" => [\n        "created" => "chat",\n        "events"  => "chat-event",\n      ],\n    ],\n    "jobs" => [\n      "chat" => [\n        "make-event" => "chat-event",\n      ],\n    ],\n  ],\n\n  /*\n  * Model Observers\n  * The class you want to use for model Observer\n  */\n  "observers"         => [\n    "models"          => [\n      "chat_event"    => Myckhel\\ChatSystem\\Observers\\ChatEventObserver::class,\n      "conversation"  => Myckhel\\ChatSystem\\Observers\\ConversationObserver::class,\n    ]\n  ]\n];\n\n\n')))}h.isMDXComponent=!0}}]);