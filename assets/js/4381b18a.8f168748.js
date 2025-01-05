"use strict";(self.webpackChunkdocs=self.webpackChunkdocs||[]).push([[7259],{5680:(e,n,t)=>{t.d(n,{xA:()=>c,yg:()=>u});var a=t(6540);function r(e,n,t){return n in e?Object.defineProperty(e,n,{value:t,enumerable:!0,configurable:!0,writable:!0}):e[n]=t,e}function s(e,n){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);n&&(a=a.filter((function(n){return Object.getOwnPropertyDescriptor(e,n).enumerable}))),t.push.apply(t,a)}return t}function i(e){for(var n=1;n<arguments.length;n++){var t=null!=arguments[n]?arguments[n]:{};n%2?s(Object(t),!0).forEach((function(n){r(e,n,t[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):s(Object(t)).forEach((function(n){Object.defineProperty(e,n,Object.getOwnPropertyDescriptor(t,n))}))}return e}function o(e,n){if(null==e)return{};var t,a,r=function(e,n){if(null==e)return{};var t,a,r={},s=Object.keys(e);for(a=0;a<s.length;a++)t=s[a],n.indexOf(t)>=0||(r[t]=e[t]);return r}(e,n);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(e);for(a=0;a<s.length;a++)t=s[a],n.indexOf(t)>=0||Object.prototype.propertyIsEnumerable.call(e,t)&&(r[t]=e[t])}return r}var l=a.createContext({}),d=function(e){var n=a.useContext(l),t=n;return e&&(t="function"==typeof e?e(n):i(i({},n),e)),t},c=function(e){var n=d(e.components);return a.createElement(l.Provider,{value:n},e.children)},p="mdxType",g={inlineCode:"code",wrapper:function(e){var n=e.children;return a.createElement(a.Fragment,{},n)}},m=a.forwardRef((function(e,n){var t=e.components,r=e.mdxType,s=e.originalType,l=e.parentName,c=o(e,["components","mdxType","originalType","parentName"]),p=d(t),m=r,u=p["".concat(l,".").concat(m)]||p[m]||g[m]||s;return t?a.createElement(u,i(i({ref:n},c),{},{components:t})):a.createElement(u,i({ref:n},c))}));function u(e,n){var t=arguments,r=n&&n.mdxType;if("string"==typeof e||r){var s=t.length,i=new Array(s);i[0]=m;var o={};for(var l in n)hasOwnProperty.call(n,l)&&(o[l]=n[l]);o.originalType=e,o[p]="string"==typeof e?e:r,i[1]=o;for(var d=2;d<s;d++)i[d]=t[d];return a.createElement.apply(null,i)}return a.createElement.apply(null,t)}m.displayName="MDXCreateElement"},9511:(e,n,t)=>{t.r(n),t.d(n,{contentTitle:()=>i,default:()=>p,frontMatter:()=>s,metadata:()=>o,toc:()=>l});var a=t(8168),r=(t(6540),t(5680));const s={id:"broadcasts",title:"ChatSystem Broadcast Events",sidebar_label:"Listening to broadcast events",slug:"/guides/broadcasts"},i=void 0,o={unversionedId:"guides/broadcasts",id:"version-v1.0.0-beta.4/guides/broadcasts",isDocsHomePage:!1,title:"ChatSystem Broadcast Events",description:"Listening to Message\\Created event",source:"@site/versioned_docs/version-v1.0.0-beta.4/guides/broadcasts.md",sourceDirName:"guides",slug:"/guides/broadcasts",permalink:"/laravel-chat-system/docs/guides/broadcasts",editUrl:"https://github.com/binkode/laravel-chat-system-docs/edit/master/versioned_docs/version-v1.0.0-beta.4/guides/broadcasts.md",version:"v1.0.0-beta.4",frontMatter:{id:"broadcasts",title:"ChatSystem Broadcast Events",sidebar_label:"Listening to broadcast events",slug:"/guides/broadcasts"},sidebar:"version-v1.0.0-beta.4/docs",previous:{title:"Using ChatEvent",permalink:"/laravel-chat-system/docs/guides/chatEvent"},next:{title:"Message",permalink:"/laravel-chat-system/docs/apis/models/message"}},l=[{value:"Listening to MessageCreated event",id:"listening-to-messagecreated-event",children:[]},{value:"Listening to MessageEvents event",id:"listening-to-messageevents-event",children:[]}],d={toc:l},c="wrapper";function p(e){let{components:n,...t}=e;return(0,r.yg)(c,(0,a.A)({},d,t,{components:n,mdxType:"MDXLayout"}),(0,r.yg)("h2",{id:"listening-to-messagecreated-event"},"Listening to Message\\Created event"),(0,r.yg)("p",null,"From the frontend channel, you may listen to ",(0,r.yg)("a",{parentName:"p",href:"../apis/events/message/created"},"Message\\Created Event")," on broadcast channel:"),(0,r.yg)("ul",null,(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("inlineCode",{parentName:"li"},"private-message-created.{$conversation_id}")," as ",(0,r.yg)("inlineCode",{parentName:"li"},"message")),(0,r.yg)("li",{parentName:"ul"},(0,r.yg)("inlineCode",{parentName:"li"},"private-message-new.user.{$participantId}")," as ",(0,r.yg)("inlineCode",{parentName:"li"},"message")," to each conversation participants")),(0,r.yg)("p",null,"Using Laravel Echo as example broadcast client"),(0,r.yg)("pre",null,(0,r.yg)("code",{parentName:"pre",className:"language-js"},"Echo.private(`message-created.${conversation_id}`)\n  .listen('message', (event) => {\n    console.log(event)\n  })\n// OR\nEcho.private(`message-new.user.${participant_id}`)\n  .listen('message', (event) => {\n    console.log(event)\n  })\n")),(0,r.yg)("details",null,(0,r.yg)("summary",null,"output"),(0,r.yg)("pre",null,(0,r.yg)("code",{parentName:"pre",className:"language-json"},'{\n  "message": {\n      "id": 922,\n      "conversation_id": 304,\n      "user_id": 13,\n      "reply_type": null,\n      "reply_id": null,\n      "message": "i am good",\n      "type": "activity",\n      "metas": null,\n      "created_at": "2021-07-23T22:36:20.000000Z",\n      "updated_at": "2021-07-23T22:36:20.000000Z",\n      "isSender": true,\n      "reply": null\n  }\n}\n'))),(0,r.yg)("h2",{id:"listening-to-messageevents-event"},"Listening to Message\\Events event"),(0,r.yg)("p",null,"From the frontend channel, you may listen to ",(0,r.yg)("a",{parentName:"p",href:"../apis/events/message/events"},"Message\\Events Event")," on broadcast channel ",(0,r.yg)("inlineCode",{parentName:"p"},"private-message-event.user.{$participant_id}")," as ",(0,r.yg)("inlineCode",{parentName:"p"},"message"),". This will broadcast to all participant otherwise it will only broadcast to the event maker if the ",(0,r.yg)("inlineCode",{parentName:"p"},"event->type")," is ",(0,r.yg)("inlineCode",{parentName:"p"},"delete")," and ",(0,r.yg)("inlineCode",{parentName:"p"},"event->all")," is not ",(0,r.yg)("inlineCode",{parentName:"p"},"true")," and ",(0,r.yg)("inlineCode",{parentName:"p"},"event->made_tye")," is ",(0,r.yg)("inlineCode",{parentName:"p"},"message"),"."),(0,r.yg)("p",null,"Using Laravel Echo as example broadcast client"),(0,r.yg)("pre",null,(0,r.yg)("code",{parentName:"pre",className:"language-js"},"Echo.private(`message-event.user.${participant_id}`)\n  .listen('message', (event) => {\n    console.log(event)\n  })\n")),(0,r.yg)("details",null,(0,r.yg)("summary",null,"output"),(0,r.yg)("pre",null,(0,r.yg)("code",{parentName:"pre",className:"language-json"},'{\n  "event": {\n        "id": 2042,\n        "maker_type": "App\\\\Models\\\\User",\n        "maker_id": 13,\n        "made_type": "App\\\\Models\\\\Message",\n        "made_id": 925,\n        "type": "read",\n        "all": false,\n        "created_at": "2021-07-23T23:00:06.000000Z",\n        "updated_at": "2021-07-23T23:00:06.000000Z",\n        "made": {\n            "id": 925,\n            "conversation_id": 305,\n            "user_id": 13,\n            "reply_type": null,\n            "reply_id": null,\n            "message": "i am good",\n            "type": "user",\n            "metas": {\n                "token": "1627080883413"\n            },\n            "created_at": "2021-07-23T22:54:44.000000Z",\n            "updated_at": "2021-07-23T22:54:44.000000Z",\n            "isSender": true\n        }\n    }\n}\n'))))}p.isMDXComponent=!0}}]);