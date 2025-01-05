"use strict";(self.webpackChunkdocs=self.webpackChunkdocs||[]).push([[9387],{5680:(e,t,n)=>{n.d(t,{xA:()=>c,yg:()=>h});var r=n(6540);function o(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function s(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function a(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?s(Object(n),!0).forEach((function(t){o(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):s(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function i(e,t){if(null==e)return{};var n,r,o=function(e,t){if(null==e)return{};var n,r,o={},s=Object.keys(e);for(r=0;r<s.length;r++)n=s[r],t.indexOf(n)>=0||(o[n]=e[n]);return o}(e,t);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(e);for(r=0;r<s.length;r++)n=s[r],t.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(e,n)&&(o[n]=e[n])}return o}var p=r.createContext({}),l=function(e){var t=r.useContext(p),n=t;return e&&(n="function"==typeof e?e(t):a(a({},t),e)),n},c=function(e){var t=l(e.components);return r.createElement(p.Provider,{value:t},e.children)},d="mdxType",u={inlineCode:"code",wrapper:function(e){var t=e.children;return r.createElement(r.Fragment,{},t)}},m=r.forwardRef((function(e,t){var n=e.components,o=e.mdxType,s=e.originalType,p=e.parentName,c=i(e,["components","mdxType","originalType","parentName"]),d=l(n),m=o,h=d["".concat(p,".").concat(m)]||d[m]||u[m]||s;return n?r.createElement(h,a(a({ref:t},c),{},{components:n})):r.createElement(h,a({ref:t},c))}));function h(e,t){var n=arguments,o=t&&t.mdxType;if("string"==typeof e||o){var s=n.length,a=new Array(s);a[0]=m;var i={};for(var p in t)hasOwnProperty.call(t,p)&&(i[p]=t[p]);i.originalType=e,i[d]="string"==typeof e?e:o,a[1]=i;for(var l=2;l<s;l++)a[l]=n[l];return r.createElement.apply(null,a)}return r.createElement.apply(null,n)}m.displayName="MDXCreateElement"},4377:(e,t,n)=>{n.r(t),n.d(t,{contentTitle:()=>a,default:()=>d,frontMatter:()=>s,metadata:()=>i,toc:()=>p});var r=n(8168),o=(n(6540),n(5680));const s={id:"guides.routes",title:"Using Routes",sidebar_label:"Using Routes",slug:"/guides/routes"},a=void 0,i={unversionedId:"guides/guides.routes",id:"version-v1.0.0-beta.4/guides/guides.routes",isDocsHomePage:!1,title:"Using Routes",description:"ChatSystem provides basic usage through some route endpoints.",source:"@site/versioned_docs/version-v1.0.0-beta.4/guides/routes.md",sourceDirName:"guides",slug:"/guides/routes",permalink:"/laravel-chat-system/docs/guides/routes",editUrl:"https://github.com/binkode/laravel-chat-system-docs/edit/master/versioned_docs/version-v1.0.0-beta.4/guides/routes.md",version:"v1.0.0-beta.4",frontMatter:{id:"guides.routes",title:"Using Routes",sidebar_label:"Using Routes",slug:"/guides/routes"},sidebar:"version-v1.0.0-beta.4/docs",previous:{title:"Using Models",permalink:"/laravel-chat-system/docs/guides/models"},next:{title:"Using Conversation",permalink:"/laravel-chat-system/docs/guides/conversation"}},p=[],l={toc:p},c="wrapper";function d(e){let{components:t,...n}=e;return(0,o.yg)(c,(0,r.A)({},l,n,{components:t,mdxType:"MDXLayout"}),(0,o.yg)("p",null,"ChatSystem provides basic usage through some route endpoints.\nYou may make use of them if suites your use cases."),(0,o.yg)("p",null,"Checkout api documentation for each route below: ",(0,o.yg)("a",{parentName:"p",href:"https://documenter.getpostman.com/view/9558301/TzXwEyDq#83bc243b-8297-417d-9fd8-18a557e4826e"},"Postman documentation link"),"."),(0,o.yg)("pre",null,(0,o.yg)("code",{parentName:"pre"},"+--------+---------------+------------------------------------------------------------+-----------------------------+--------------------------------------------------------------------+---------------------------------------------+\n| Domain | Method        | URI                                                        | Name                        | Action                                                             | Middleware                                  |\n+--------+---------------+------------------------------------------------------------+-----------------------------+--------------------------------------------------------------------+---------------------------------------------+\n|        | GET|HEAD      | api/chat_events                                            | chat_events.index           | Binkode\\ChatSystem\\Http\\Controllers\\ChatEventController@index      | App\\Http\\Middleware\\Authenticate:sanctum    |\n|        |               |                                                            |                             |                                                                    | api                                         |\n|        | POST          | api/chat_events                                            | chat_events.store           | Binkode\\ChatSystem\\Http\\Controllers\\ChatEventController@store      | App\\Http\\Middleware\\Authenticate:sanctum    |\n|        |               |                                                            |                             |                                                                    | api                                         |\n|        | GET|HEAD      | api/chat_events/{chat_event}                               | chat_events.show            | Binkode\\ChatSystem\\Http\\Controllers\\ChatEventController@show       | App\\Http\\Middleware\\Authenticate:sanctum    |\n|        |               |                                                            |                             |                                                                    | api                                         |\n|        | PUT|PATCH     | api/chat_events/{chat_event}                               | chat_events.update          | Binkode\\ChatSystem\\Http\\Controllers\\ChatEventController@update     | App\\Http\\Middleware\\Authenticate:sanctum    |\n|        |               |                                                            |                             |                                                                    | api                                         |\n|        | DELETE        | api/chat_events/{chat_event}                               | chat_events.destroy         | Binkode\\ChatSystem\\Http\\Controllers\\ChatEventController@destroy    | App\\Http\\Middleware\\Authenticate:sanctum    |\n|        |               |                                                            |                             |                                                                    | api                                         |\n|        | GET|HEAD      | api/conversations                                          | conversations.index         | Binkode\\ChatSystem\\Http\\Controllers\\ConversationController@index   | App\\Http\\Middleware\\Authenticate:sanctum    |\n|        |               |                                                            |                             |                                                                    | api                                         |\n|        | POST          | api/conversations                                          | conversations.store         | Binkode\\ChatSystem\\Http\\Controllers\\ConversationController@store   | App\\Http\\Middleware\\Authenticate:sanctum    |\n|        |               |                                                            |                             |                                                                    | api                                         |\n|        | GET|HEAD      | api/conversations/count                                    | generated::qP7MgZeXOQ2KO9kH | Binkode\\ChatSystem\\Http\\Controllers\\ConversationController@count   | App\\Http\\Middleware\\Authenticate:sanctum    |\n|        |               |                                                            |                             |                                                                    | api                                         |\n|        | GET|HEAD      | api/conversations/{conversation}                           | conversations.show          | Binkode\\ChatSystem\\Http\\Controllers\\ConversationController@show    | App\\Http\\Middleware\\Authenticate:sanctum    |\n|        |               |                                                            |                             |                                                                    | api                                         |\n|        | PUT|PATCH     | api/conversations/{conversation}                           | conversations.update        | Binkode\\ChatSystem\\Http\\Controllers\\ConversationController@update  | App\\Http\\Middleware\\Authenticate:sanctum    |\n|        |               |                                                            |                             |                                                                    | api                                         |\n|        | DELETE        | api/conversations/{conversation}                           | conversations.destroy       | Binkode\\ChatSystem\\Http\\Controllers\\ConversationController@destroy | App\\Http\\Middleware\\Authenticate:sanctum    |\n|        |               |                                                            |                             |                                                                    | api                                         |\n|        | DELETE        | api/messages                                               | generated::P5UtLfEaXJNWQUcU | Binkode\\ChatSystem\\Http\\Controllers\\MessageController@delete       | App\\Http\\Middleware\\Authenticate:sanctum    |\n|        |               |                                                            |                             |                                                                    | api                                         |\n|        | GET|HEAD      | api/messages                                               | messages.index              | Binkode\\ChatSystem\\Http\\Controllers\\MessageController@index        | App\\Http\\Middleware\\Authenticate:sanctum    |\n|        |               |                                                            |                             |                                                                    | api                                         |\n|        | POST          | api/messages                                               | messages.store              | Binkode\\ChatSystem\\Http\\Controllers\\MessageController@store        | App\\Http\\Middleware\\Authenticate:sanctum    |\n|        |               |                                                            |                             |                                                                    | api                                         |\n|        | GET|HEAD      | api/messages/{message}                                     | messages.show               | Binkode\\ChatSystem\\Http\\Controllers\\MessageController@show         | App\\Http\\Middleware\\Authenticate:sanctum    |\n|        |               |                                                            |                             |                                                                    | api                                         |\n|        | PUT|PATCH     | api/messages/{message}                                     | messages.update             | Binkode\\ChatSystem\\Http\\Controllers\\MessageController@update       | App\\Http\\Middleware\\Authenticate:sanctum    |\n|        |               |                                                            |                             |                                                                    | api                                         |\n|        | DELETE        | api/messages/{message}                                     | messages.destroy            | Binkode\\ChatSystem\\Http\\Controllers\\MessageController@destroy      | App\\Http\\Middleware\\Authenticate:sanctum    |\n+--------+---------------+------------------------------------------------------------+-----------------------------+--------------------------------------------------------------------+---------------------------------------------+\n")))}d.isMDXComponent=!0}}]);