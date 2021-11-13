(self.webpackChunkdocs=self.webpackChunkdocs||[]).push([[5115],{3905:function(e,t,n){"use strict";n.d(t,{Zo:function(){return u},kt:function(){return g}});var a=n(7294);function s(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function r(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);t&&(a=a.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,a)}return n}function i(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?r(Object(n),!0).forEach((function(t){s(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):r(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function o(e,t){if(null==e)return{};var n,a,s=function(e,t){if(null==e)return{};var n,a,s={},r=Object.keys(e);for(a=0;a<r.length;a++)n=r[a],t.indexOf(n)>=0||(s[n]=e[n]);return s}(e,t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);for(a=0;a<r.length;a++)n=r[a],t.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(e,n)&&(s[n]=e[n])}return s}var l=a.createContext({}),c=function(e){var t=a.useContext(l),n=t;return e&&(n="function"==typeof e?e(t):i(i({},t),e)),n},u=function(e){var t=c(e.components);return a.createElement(l.Provider,{value:t},e.children)},d={inlineCode:"code",wrapper:function(e){var t=e.children;return a.createElement(a.Fragment,{},t)}},m=a.forwardRef((function(e,t){var n=e.components,s=e.mdxType,r=e.originalType,l=e.parentName,u=o(e,["components","mdxType","originalType","parentName"]),m=c(n),g=s,p=m["".concat(l,".").concat(g)]||m[g]||d[g]||r;return n?a.createElement(p,i(i({ref:t},u),{},{components:n})):a.createElement(p,i({ref:t},u))}));function g(e,t){var n=arguments,s=t&&t.mdxType;if("string"==typeof e||s){var r=n.length,i=new Array(r);i[0]=m;var o={};for(var l in t)hasOwnProperty.call(t,l)&&(o[l]=t[l]);o.originalType=e,o.mdxType="string"==typeof e?e:s,i[1]=o;for(var c=2;c<r;c++)i[c]=n[c];return a.createElement.apply(null,i)}return a.createElement.apply(null,n)}m.displayName="MDXCreateElement"},8030:function(e,t,n){"use strict";n.r(t),n.d(t,{frontMatter:function(){return i},contentTitle:function(){return o},metadata:function(){return l},toc:function(){return c},default:function(){return d}});var a=n(2122),s=n(9756),r=(n(7294),n(3905)),i={id:"guides.message",title:"Using Message",sidebar_label:"Using Message",slug:"/guides/message"},o=void 0,l={unversionedId:"guides/guides.message",id:"version-v1.0.0-beta.0/guides/guides.message",isDocsHomePage:!1,title:"Using Message",description:"Creating message",source:"@site/versioned_docs/version-v1.0.0-beta.0/guides/message.md",sourceDirName:"guides",slug:"/guides/message",permalink:"/laravel-chat-system/docs/guides/message",editUrl:"https://github.com/myckhel/laravel-chat-system-docs/edit/master/versioned_docs/version-v1.0.0-beta.0/guides/message.md",version:"v1.0.0-beta.0",frontMatter:{id:"guides.message",title:"Using Message",sidebar_label:"Using Message",slug:"/guides/message"},sidebar:"version-v1.0.0-beta.0/docs",previous:{title:"Using Conversation",permalink:"/laravel-chat-system/docs/guides/conversation"},next:{title:"Using ChatEvent",permalink:"/laravel-chat-system/docs/guides/chatEvent"}},c=[{value:"Creating message",id:"creating-message",children:[]},{value:"Broadcasting Message Created",id:"broadcasting-message-created",children:[]},{value:"Creating an activity message type",id:"creating-an-activity-message-type",children:[]},{value:"Creating a message with token",id:"creating-a-message-with-token",children:[]},{value:"Deleting message",id:"deleting-message",children:[]}],u={toc:c};function d(e){var t=e.components,n=(0,s.Z)(e,["components"]);return(0,r.kt)("wrapper",(0,a.Z)({},u,n,{components:t,mdxType:"MDXLayout"}),(0,r.kt)("h2",{id:"creating-message"},"Creating message"),(0,r.kt)("p",null,"You may create a message within a conversation using its ",(0,r.kt)("inlineCode",{parentName:"p"},"messages")," relationship method."),(0,r.kt)("pre",null,(0,r.kt)("code",{parentName:"pre",className:"language-php"},"$conversation = $user->conversations($conversation_id)->first();\n\n$conversation->messages()->create([\n  'reply_id'        => $reply_id, // eg. message_id\n  'reply_type'      => $reply_type, // eg. message::class\n  'user_id'         => $user->id,\n  'message'         => 'hello laravel',\n  'type'            => 'user', // default user\n]);\n")),(0,r.kt)("h2",{id:"broadcasting-message-created"},"Broadcasting Message Created"),(0,r.kt)("p",null,"You may broadcast a ",(0,r.kt)("a",{parentName:"p",href:"../apis/events/message/created"},"message created event")," after creating a message for websocket clients to receive."),(0,r.kt)("pre",null,(0,r.kt)("code",{parentName:"pre",className:"language-php"},"use Myckhel\\ChatSystem\\Events\\Message\\Created;\n\nbroadcast(new Created($message));\n")),(0,r.kt)("details",null,(0,r.kt)("summary",null,"output"),(0,r.kt)("pre",null,(0,r.kt)("code",{parentName:"pre",className:"language-json"},'[2021-07-23 22:36:25] local.INFO: Broadcasting [message] on channels [private-message-created.304, private-message-new.user.13] with payload:\n{\n    "message": {\n        "id": 922,\n        "conversation_id": 304,\n        "user_id": 13,\n        "reply_type": null,\n        "reply_id": null,\n        "message": "i am good",\n        "type": "activity",\n        "metas": null,\n        "created_at": "2021-07-23T22:36:20.000000Z",\n        "updated_at": "2021-07-23T22:36:20.000000Z",\n        "isSender": true,\n        "reply": null\n    },\n    "socket": null\n}  \n'))),(0,r.kt)("h2",{id:"creating-an-activity-message-type"},"Creating an activity message type"),(0,r.kt)("p",null,"A message type is default to ",(0,r.kt)("inlineCode",{parentName:"p"},"user")," which means its a user message.\nYou may want to create another type of messages, for example, a ",(0,r.kt)("inlineCode",{parentName:"p"},"system")," or an ",(0,r.kt)("inlineCode",{parentName:"p"},"activity")," message.\nAn activity message can be used to hold a single event of a conversation. A user leaving a conversation is an event that occurs in a conversation which the event can be remembered by creating an activity message with the event."),(0,r.kt)("pre",null,(0,r.kt)("code",{parentName:"pre",className:"language-php"},"$conversation = $user->conversations($conversation_id)->first();\n\n$conversation->createActivityMessage([\n  'user_id'         => $user->id,\n  'message'         => 'Someone left the conversation',\n]);\n")),(0,r.kt)("details",null,(0,r.kt)("summary",null,"output"),(0,r.kt)("pre",null,(0,r.kt)("code",{parentName:"pre",className:"language-json"},'{\n    "user_id": 13,\n    "message": "Someone left the conversation",\n    "type": "activity",\n    "conversation_id": 304,\n    "updated_at": "2021-07-23T22:36:20.000000Z",\n    "created_at": "2021-07-23T22:36:20.000000Z",\n    "id": 922,\n}\n'))),(0,r.kt)("h2",{id:"creating-a-message-with-token"},"Creating a message with token"),(0,r.kt)("p",null,"You may use message unique token feature to prevent creating duplicate messages.\nFor example, In your frontend app, you might be using job queue to create messages. let assume job queue sent request to the backend to create a message, after the message was created, client network lost and client couldn't know if the message was created but the message was surely created, now exception has occured and job queue has tried to send the same message later after network was regained, now the same message has been created twice.\nIf you had provided a unique token, the backend would have check and responded with an existing message having the token otherwise creates a new message. "),(0,r.kt)("pre",null,(0,r.kt)("code",{parentName:"pre",className:"language-php"},"$conversation = $user->conversations($conversation_id)->first();\n\n$conversation->createMessageWithToken($token, [\n  'user_id'         => $user->id,\n  'message'         => 'hello laravel',\n]);\n")),(0,r.kt)("details",null,(0,r.kt)("summary",null,"output"),(0,r.kt)("pre",null,(0,r.kt)("code",{parentName:"pre",className:"language-json"},'{\n    "user_id": 13,\n    "message": "i am good",\n    "type": "user",\n    "metas": {\n        "token": "1627076937515"\n    },\n    "conversation_id": 300,\n    "updated_at": "2021-07-23T21:48:58.000000Z",\n    "created_at": "2021-07-23T21:48:58.000000Z",\n    "id": 907,\n    "isSender": true,\n}\n'))),(0,r.kt)("h2",{id:"deleting-message"},"Deleting message"),(0,r.kt)("p",null,"You may delete message(s) with ",(0,r.kt)("a",{parentName:"p",href:"../apis/models/message#makedelete"},"makeDelete")," method which requires 1 argument = user deleting the conversation.\nYou can specify delete for all option by passing named argument ",(0,r.kt)("inlineCode",{parentName:"p"},"all")," which will specify that the message has been deleted for all participants.\nThe method will also try to emit ",(0,r.kt)("a",{parentName:"p",href:"../apis/events/message/events"},"Message Events")),(0,r.kt)("pre",null,(0,r.kt)("code",{parentName:"pre",className:"language-php"},"$message->makeDelete($user, $everyone);\n")),(0,r.kt)("details",null,(0,r.kt)("summary",null,"output"),(0,r.kt)("pre",null,(0,r.kt)("code",{parentName:"pre",className:"language-json"},'[2021-07-23 22:54:58] local.INFO: Broadcasting [message] on channels [private-message-event.user.13, private-message-event.user.10] with payload:\n{\n    "event": {\n        "id": 2041,\n        "maker_type": "App\\\\Models\\\\User",\n        "maker_id": 13,\n        "made_type": "App\\\\Models\\\\Message",\n        "made_id": 925,\n        "type": "delete",\n        "all": true,\n        "created_at": "2021-07-23T22:54:57.000000Z",\n        "updated_at": "2021-07-23T22:54:57.000000Z",\n        "made": {\n            "id": 925,\n            "conversation_id": 305,\n            "user_id": 13,\n            "message": "i am good",\n            "type": "user",\n            "metas": {\n                "token": "1627080883413"\n            },\n            "created_at": "2021-07-23T22:54:44.000000Z",\n            "updated_at": "2021-07-23T22:54:44.000000Z",\n        }\n    },\n    "conversation_id": 305,\n    "socket": null\n}\n'))))}d.isMDXComponent=!0}}]);