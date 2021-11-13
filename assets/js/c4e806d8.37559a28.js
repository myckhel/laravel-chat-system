(self.webpackChunkdocs=self.webpackChunkdocs||[]).push([[7803],{3905:function(e,t,a){"use strict";a.d(t,{Zo:function(){return p},kt:function(){return k}});var n=a(7294);function r(e,t,a){return t in e?Object.defineProperty(e,t,{value:a,enumerable:!0,configurable:!0,writable:!0}):e[t]=a,e}function l(e,t){var a=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),a.push.apply(a,n)}return a}function s(e){for(var t=1;t<arguments.length;t++){var a=null!=arguments[t]?arguments[t]:{};t%2?l(Object(a),!0).forEach((function(t){r(e,t,a[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(a)):l(Object(a)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(a,t))}))}return e}function i(e,t){if(null==e)return{};var a,n,r=function(e,t){if(null==e)return{};var a,n,r={},l=Object.keys(e);for(n=0;n<l.length;n++)a=l[n],t.indexOf(a)>=0||(r[a]=e[a]);return r}(e,t);if(Object.getOwnPropertySymbols){var l=Object.getOwnPropertySymbols(e);for(n=0;n<l.length;n++)a=l[n],t.indexOf(a)>=0||Object.prototype.propertyIsEnumerable.call(e,a)&&(r[a]=e[a])}return r}var o=n.createContext({}),d=function(e){var t=n.useContext(o),a=t;return e&&(a="function"==typeof e?e(t):s(s({},t),e)),a},p=function(e){var t=d(e.components);return n.createElement(o.Provider,{value:t},e.children)},m={inlineCode:"code",wrapper:function(e){var t=e.children;return n.createElement(n.Fragment,{},t)}},u=n.forwardRef((function(e,t){var a=e.components,r=e.mdxType,l=e.originalType,o=e.parentName,p=i(e,["components","mdxType","originalType","parentName"]),u=d(a),k=r,c=u["".concat(o,".").concat(k)]||u[k]||m[k]||l;return a?n.createElement(c,s(s({ref:t},p),{},{components:a})):n.createElement(c,s({ref:t},p))}));function k(e,t){var a=arguments,r=t&&t.mdxType;if("string"==typeof e||r){var l=a.length,s=new Array(l);s[0]=u;var i={};for(var o in t)hasOwnProperty.call(t,o)&&(i[o]=t[o]);i.originalType=e,i.mdxType="string"==typeof e?e:r,s[1]=i;for(var d=2;d<l;d++)s[d]=a[d];return n.createElement.apply(null,s)}return n.createElement.apply(null,a)}u.displayName="MDXCreateElement"},9251:function(e,t,a){"use strict";a.r(t),a.d(t,{frontMatter:function(){return s},contentTitle:function(){return i},metadata:function(){return o},toc:function(){return d},default:function(){return m}});var n=a(2122),r=a(9756),l=(a(7294),a(3905)),s={id:"message",title:"Message APIs",sidebar_label:"Message",slug:"/apis/models/message"},i=void 0,o={unversionedId:"apis/models/message",id:"apis/models/message",isDocsHomePage:!1,title:"Message APIs",description:"Namespace",source:"@site/docs/apis/models/message.md",sourceDirName:"apis/models",slug:"/apis/models/message",permalink:"/laravel-chat-system/docs/next/apis/models/message",editUrl:"https://github.com/myckhel/laravel-chat-system-docs/edit/master/docs/apis/models/message.md",version:"current",frontMatter:{id:"message",title:"Message APIs",sidebar_label:"Message",slug:"/apis/models/message"},sidebar:"docs",previous:{title:"Listening to broadcast events",permalink:"/laravel-chat-system/docs/next/guides/broadcasts"},next:{title:"Conversation",permalink:"/laravel-chat-system/docs/next/apis/models/conversation"}},d=[{value:"<strong>Namespace</strong>",id:"namespace",children:[]},{value:"<strong>Columns</strong>",id:"columns",children:[]},{value:"Query Builders",id:"query-builders",children:[{value:"<code>whereNotSender()</code>",id:"wherenotsender",children:[]},{value:"<code>whereReply()</code>",id:"wherereply",children:[]},{value:"<code>whereDoesntHaveChatEvents()</code>",id:"wheredoesnthavechatevents",children:[]},{value:"<code>whereNotReadBy()</code>",id:"wherenotreadby",children:[]},{value:"<code>whereNotDeliveredTo()</code>",id:"wherenotdeliveredto",children:[]},{value:"<code>whereNotDeletedBy()</code>",id:"wherenotdeletedby",children:[]},{value:"<code>whereRelatedTo()</code>",id:"whererelatedto",children:[]},{value:"<code>hasEvent()</code>",id:"hasevent",children:[]},{value:"<code>HasNoEvent()</code>",id:"hasnoevent",children:[]},{value:"<code>whereConversationWasntDeleted()</code>",id:"whereconversationwasntdeleted",children:[]},{value:"<code>whereConversationWasntDeleted()</code>",id:"whereconversationwasntdeleted-1",children:[]}]},{value:"Util Methods",id:"util-methods",children:[{value:"<code>participantsHasDeleted()</code>",id:"participantshasdeleted",children:[]},{value:"<code>makeDelete()</code>",id:"makedelete",children:[]},{value:"<code>makeRead()</code>",id:"makeread",children:[]},{value:"<code>makeDeliver()</code>",id:"makedeliver",children:[]},{value:"<code>participants()</code>",id:"participants",children:[]}]},{value:"Relationships",id:"relationships",children:[{value:"<code>conversation()</code>",id:"conversation",children:[]},{value:"<code>chatEvents()</code>",id:"chatevents",children:[]},{value:"<code>sender()</code>",id:"sender",children:[]},{value:"<code>reply()</code>",id:"reply",children:[]}]},{value:"Collection methods",id:"collection-methods",children:[{value:"<code>makeRead()</code>",id:"makeread-1",children:[]},{value:"<code>makeDelete()</code>",id:"makedelete-1",children:[]},{value:"<code>makeDeliver()</code>",id:"makedeliver-1",children:[]},{value:"<code>makeChatEvent()</code>",id:"makechatevent",children:[]}]}],p={toc:d};function m(e){var t=e.components,a=(0,r.Z)(e,["components"]);return(0,l.kt)("wrapper",(0,n.Z)({},p,a,{components:t,mdxType:"MDXLayout"}),(0,l.kt)("h2",{id:"namespace"},(0,l.kt)("strong",{parentName:"h2"},"Namespace")),(0,l.kt)("p",null,(0,l.kt)("inlineCode",{parentName:"p"},"Myckhel\\ChatSystem\\Models\\Message")),(0,l.kt)("h2",{id:"columns"},(0,l.kt)("strong",{parentName:"h2"},"Columns")),(0,l.kt)("table",null,(0,l.kt)("thead",{parentName:"table"},(0,l.kt)("tr",{parentName:"thead"},(0,l.kt)("th",{parentName:"tr",align:null},"name"),(0,l.kt)("th",{parentName:"tr",align:null},"type"),(0,l.kt)("th",{parentName:"tr",align:null},"description"))),(0,l.kt)("tbody",{parentName:"table"},(0,l.kt)("tr",{parentName:"tbody"},(0,l.kt)("td",{parentName:"tr",align:null},(0,l.kt)("inlineCode",{parentName:"td"},"conversation_id")),(0,l.kt)("td",{parentName:"tr",align:null},"int"),(0,l.kt)("td",{parentName:"tr",align:null},"conversation id message belongs to")),(0,l.kt)("tr",{parentName:"tbody"},(0,l.kt)("td",{parentName:"tr",align:null},(0,l.kt)("inlineCode",{parentName:"td"},"user_id")),(0,l.kt)("td",{parentName:"tr",align:null},"int"),(0,l.kt)("td",{parentName:"tr",align:null},"user id message belongs to")),(0,l.kt)("tr",{parentName:"tbody"},(0,l.kt)("td",{parentName:"tr",align:null},(0,l.kt)("inlineCode",{parentName:"td"},"reply_id")),(0,l.kt)("td",{parentName:"tr",align:null},"int"),(0,l.kt)("td",{parentName:"tr",align:null},"reply id message belongs to")),(0,l.kt)("tr",{parentName:"tbody"},(0,l.kt)("td",{parentName:"tr",align:null},(0,l.kt)("inlineCode",{parentName:"td"},"reply_type")),(0,l.kt)("td",{parentName:"tr",align:null},"string"),(0,l.kt)("td",{parentName:"tr",align:null},"reply class message belongs to")),(0,l.kt)("tr",{parentName:"tbody"},(0,l.kt)("td",{parentName:"tr",align:null},(0,l.kt)("inlineCode",{parentName:"td"},"message")),(0,l.kt)("td",{parentName:"tr",align:null},"string"),(0,l.kt)("td",{parentName:"tr",align:null},"message text")),(0,l.kt)("tr",{parentName:"tbody"},(0,l.kt)("td",{parentName:"tr",align:null},(0,l.kt)("inlineCode",{parentName:"td"},"type")),(0,l.kt)("td",{parentName:"tr",align:null},"enum(user, system, activity)"),(0,l.kt)("td",{parentName:"tr",align:null},"message text")),(0,l.kt)("tr",{parentName:"tbody"},(0,l.kt)("td",{parentName:"tr",align:null},(0,l.kt)("inlineCode",{parentName:"td"},"metas")),(0,l.kt)("td",{parentName:"tr",align:null},"json"),(0,l.kt)("td",{parentName:"tr",align:null},"message key values")))),(0,l.kt)("h2",{id:"query-builders"},"Query Builders"),(0,l.kt)("p",null,"Message Model Query Builder APIs"),(0,l.kt)("h3",{id:"wherenotsender"},(0,l.kt)("inlineCode",{parentName:"h3"},"whereNotSender()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"adds query to to exclude the given user")),(0,l.kt)("h4",{id:"params"},"@Params"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"?user"))," | message sender to exclude. | ",(0,l.kt)("inlineCode",{parentName:"li"},"int|IChatEventMaker|null"))),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"Message::whereNotSender($user)->get();\n")),(0,l.kt)("h3",{id:"wherereply"},(0,l.kt)("inlineCode",{parentName:"h3"},"whereReply()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"adds query condition on the given reply_id and or reply_type")),(0,l.kt)("h4",{id:"params-1"},"@Params"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"reply"))," | message sender to exclude. | ",(0,l.kt)("inlineCode",{parentName:"li"},"array[reply_id => int, reply_type => string]"))),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"Message::whereReply([\n  'reply_id' => 1,\n  'reply_type' => Message::class\n])->get();\n")),(0,l.kt)("h3",{id:"wheredoesnthavechatevents"},(0,l.kt)("inlineCode",{parentName:"h3"},"whereDoesntHaveChatEvents()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"adds query where message doesn't have chatEvents")),(0,l.kt)("h4",{id:"params-2"},"@Params"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"?type"))," | adds condition where = message chatEvents.type. | ",(0,l.kt)("inlineCode",{parentName:"li"},"string(read|delete|deliver)")),(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"?user"))," | adds condition where user = message chatEvents maker | ",(0,l.kt)("inlineCode",{parentName:"li"},"int|IChatEventMaker|null")),(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"?conversationScope"))," | callback to get the conversation query object. | ",(0,l.kt)("inlineCode",{parentName:"li"},"null|Closure"))),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"Message::whereDoesntHaveChatEvents(\n  'read',\n  $user,\n  fn ($query) => $query->where('created_at', '<', NOW())\n)->get();\n")),(0,l.kt)("h3",{id:"wherenotreadby"},(0,l.kt)("inlineCode",{parentName:"h3"},"whereNotReadBy()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"adds query where message is not read by the given user")),(0,l.kt)("h4",{id:"params-3"},"@Params"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"?user"))," | adds condition where user = message chatEvents maker | ",(0,l.kt)("inlineCode",{parentName:"li"},"int|IChatEventMaker|null"))),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"Message::whereNotReadBy(\n  $user,\n)->get();\n")),(0,l.kt)("h3",{id:"wherenotdeliveredto"},(0,l.kt)("inlineCode",{parentName:"h3"},"whereNotDeliveredTo()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"adds query where message is not delivered to the given user")),(0,l.kt)("h4",{id:"params-4"},"@Params"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"?user"))," | adds condition where user = message chatEvents maker | ",(0,l.kt)("inlineCode",{parentName:"li"},"int|IChatEventMaker|null"))),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"Message::whereNotDeliveredTo(\n  $user,\n)->get();\n")),(0,l.kt)("h3",{id:"wherenotdeletedby"},(0,l.kt)("inlineCode",{parentName:"h3"},"whereNotDeletedBy()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"adds query where message is not deleted by the given user")),(0,l.kt)("h4",{id:"params-5"},"@Params"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"?user"))," | adds condition where user = message chatEvents maker | ",(0,l.kt)("inlineCode",{parentName:"li"},"int|IChatEventMaker|null"))),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"Message::whereNotDeletedBy(\n  $user,\n)->get();\n")),(0,l.kt)("h3",{id:"whererelatedto"},(0,l.kt)("inlineCode",{parentName:"h3"},"whereRelatedTo()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"adds query where message has participant = user")),(0,l.kt)("h4",{id:"params-6"},"@Params"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"user"))," | adds condition where user = participant | ",(0,l.kt)("inlineCode",{parentName:"li"},"int|IChatEventMaker|null"))),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"Message::whereRelatedTo(\n  $user,\n)->get();\n")),(0,l.kt)("h3",{id:"hasevent"},(0,l.kt)("inlineCode",{parentName:"h3"},"hasEvent()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"adds query where message has chatEvents")),(0,l.kt)("h4",{id:"params-7"},"@Params"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"eventScope?"))," | callback to get the chatEvents query object. | ",(0,l.kt)("inlineCode",{parentName:"li"},"callable"))),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"Message::hasEvents(\n  fn ($q) => $q->whereType('read'),\n)->get();\n")),(0,l.kt)("h3",{id:"hasnoevent"},(0,l.kt)("inlineCode",{parentName:"h3"},"HasNoEvent()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"adds query where message has no chatEvents")),(0,l.kt)("h4",{id:"params-8"},"@Params"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"eventScope?"))," | callback to get the chatEvents query object. | ",(0,l.kt)("inlineCode",{parentName:"li"},"callable"))),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"Message::HasNoEvent(\n  fn ($q) => $q->whereType('deliver'),\n)->get();\n")),(0,l.kt)("h3",{id:"whereconversationwasntdeleted"},(0,l.kt)("inlineCode",{parentName:"h3"},"whereConversationWasntDeleted()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"query where message's conversation has not been deleted")),(0,l.kt)("h4",{id:"params-9"},"@Params"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"by?"))," | adds condition where conversation was not deleted by the given user. | ",(0,l.kt)("inlineCode",{parentName:"li"},"user"))),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"Message::whereConversationWasntDeleted(\n  $user,\n)->get();\n")),(0,l.kt)("h3",{id:"whereconversationwasntdeleted-1"},(0,l.kt)("inlineCode",{parentName:"h3"},"whereConversationWasntDeleted()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"query where message's conversation has not been deleted")),(0,l.kt)("h4",{id:"params-10"},"@Params"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"by?"))," | adds condition where conversation was not deleted by the given user. | ",(0,l.kt)("inlineCode",{parentName:"li"},"user"))),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"Message::whereConversationWasntDeleted(\n  $user,\n)->get();\n")),(0,l.kt)("h2",{id:"util-methods"},"Util Methods"),(0,l.kt)("h3",{id:"participantshasdeleted"},(0,l.kt)("inlineCode",{parentName:"h3"},"participantsHasDeleted()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"check if message has been deleted by all participants of the conversation message belongs to.")),(0,l.kt)("h4",{id:"return"},"@Return"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},"type ",(0,l.kt)("inlineCode",{parentName:"li"},"bool"))),(0,l.kt)("h4",{id:"params-11"},"@Params"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"?maker_id"))," | chatEvent maker_id to exclude | ",(0,l.kt)("inlineCode",{parentName:"li"},"int"))),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"$message = $user->messages()->first();\n$message->participantsHasDeleted($user->id); // true|false\n")),(0,l.kt)("h3",{id:"makedelete"},(0,l.kt)("inlineCode",{parentName:"h3"},"makeDelete()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"create a chatEvent of type ",(0,l.kt)("inlineCode",{parentName:"p"},"delete")," for the ",(0,l.kt)("inlineCode",{parentName:"p"},"message")," through the given ",(0,l.kt)("inlineCode",{parentName:"p"},"user"))),(0,l.kt)("h4",{id:"return-1"},"@Return"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},"type ",(0,l.kt)("a",{parentName:"li",href:"chatEvent"},"ChatEvent Model"))),(0,l.kt)("h4",{id:"emits"},"@Emits"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},"type ",(0,l.kt)("a",{parentName:"li",href:"../events/message/events"},"Message Events"))),(0,l.kt)("h4",{id:"params-12"},"@Params"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"user"))," | user to assign the event to | ",(0,l.kt)("inlineCode",{parentName:"li"},"user")),(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"?all"))," | specify whether to apply event for all. this should set the chat event column to ",(0,l.kt)("inlineCode",{parentName:"li"},"true|false")," | ",(0,l.kt)("inlineCode",{parentName:"li"},"bool"))),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"$message = $user->messages()->first();\n$message->makeDelete($user);\n")),(0,l.kt)("h3",{id:"makeread"},(0,l.kt)("inlineCode",{parentName:"h3"},"makeRead()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"create a chatEvent of type ",(0,l.kt)("inlineCode",{parentName:"p"},"read")," for the ",(0,l.kt)("inlineCode",{parentName:"p"},"message")," through the given ",(0,l.kt)("inlineCode",{parentName:"p"},"user"))),(0,l.kt)("h4",{id:"return-2"},"@Return"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},"type ",(0,l.kt)("a",{parentName:"li",href:"chatEvent"},"ChatEvent Model"))),(0,l.kt)("h4",{id:"emits-1"},"@Emits"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},"type ",(0,l.kt)("a",{parentName:"li",href:"../events/message/events"},"Message Events"))),(0,l.kt)("h4",{id:"params-13"},"@Params"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"user"))," | user to assign the event to | ",(0,l.kt)("inlineCode",{parentName:"li"},"user"))),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"$message = $user->messages()->first();\n$message->makeRead($user);\n")),(0,l.kt)("h3",{id:"makedeliver"},(0,l.kt)("inlineCode",{parentName:"h3"},"makeDeliver()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"create a chatEvent of type ",(0,l.kt)("inlineCode",{parentName:"p"},"deliver")," for the ",(0,l.kt)("inlineCode",{parentName:"p"},"message")," through the given ",(0,l.kt)("inlineCode",{parentName:"p"},"user"))),(0,l.kt)("h4",{id:"return-3"},"@Return"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},"type ",(0,l.kt)("a",{parentName:"li",href:"chatEvent"},"ChatEvent Model"))),(0,l.kt)("h4",{id:"emits-2"},"@Emits"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},"type ",(0,l.kt)("a",{parentName:"li",href:"../events/message/events"},"Message Events"))),(0,l.kt)("h4",{id:"params-14"},"@Params"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"user"))," | user to assign the event to | ",(0,l.kt)("inlineCode",{parentName:"li"},"user"))),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"$message = $user->messages()->first();\n$message->makeDeliver($user);\n")),(0,l.kt)("h3",{id:"participants"},(0,l.kt)("inlineCode",{parentName:"h3"},"participants()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"Query participants of the conversation the message belongs to.")),(0,l.kt)("h4",{id:"return-4"},"@Return"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},"type ",(0,l.kt)("inlineCode",{parentName:"li"},"ConversationUser Query Builder"))),(0,l.kt)("h4",{id:"params-15"},"@Params"),(0,l.kt)("ul",null,(0,l.kt)("li",{parentName:"ul"},(0,l.kt)("strong",{parentName:"li"},(0,l.kt)("inlineCode",{parentName:"strong"},"?user"))," | adds condition where participant = user | ",(0,l.kt)("inlineCode",{parentName:"li"},"int|user"))),(0,l.kt)("p",null,"find user from the message's participants"),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"$message = $user->messages()->first();\n$message->participants($otherUser)->find(); // ConversationUser|null\n")),(0,l.kt)("h2",{id:"relationships"},"Relationships"),(0,l.kt)("p",null,"These are methods that defines the relationship between models."),(0,l.kt)("h3",{id:"conversation"},(0,l.kt)("inlineCode",{parentName:"h3"},"conversation()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"Conversation message belongs to.")),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"$message = $user->messages()->first();\n$message->conversation->id;\n")),(0,l.kt)("h3",{id:"chatevents"},(0,l.kt)("inlineCode",{parentName:"h3"},"chatEvents()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"Message has many chat events")),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"$message = $user->messages()->first();\n$message->chatEvents;\n")),(0,l.kt)("h3",{id:"sender"},(0,l.kt)("inlineCode",{parentName:"h3"},"sender()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"Message belongs to user")),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"$message = $user->messages()->first();\n$message->user;\n")),(0,l.kt)("h3",{id:"reply"},(0,l.kt)("inlineCode",{parentName:"h3"},"reply()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"Message belongs to message as reply")),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"$message = $user->messages()->first();\n$message->reply;\n")),(0,l.kt)("h2",{id:"collection-methods"},"Collection methods"),(0,l.kt)("p",null,"These are methods that could be called on collection of messages."),(0,l.kt)("h3",{id:"makeread-1"},(0,l.kt)("inlineCode",{parentName:"h3"},"makeRead()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"Method to mark messages as read,\npass a user arg to specify the user reading the messages. ")),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"$messages = $user->messages()->get();\n\n$messages->makeRead($user);\n")),(0,l.kt)("h3",{id:"makedelete-1"},(0,l.kt)("inlineCode",{parentName:"h3"},"makeDelete()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"Method to mark messages as deleted,\npass a user arg to specify the user deleting the messages.\npass a all arg to delete the messages for a participants of the message conversation. ")),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"$messages = $user->messages()->get();\n\n$messages->makeDelete(user: $user, all: false);\n")),(0,l.kt)("h3",{id:"makedeliver-1"},(0,l.kt)("inlineCode",{parentName:"h3"},"makeDeliver()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"Method to mark messages as delivered,\npass a user arg to specify the user which messages are being delivered to. ")),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"$messages = $user->messages()->get();\n\n$messages->makeDeliver(user: $user, all: false);\n")),(0,l.kt)("h3",{id:"makechatevent"},(0,l.kt)("inlineCode",{parentName:"h3"},"makeChatEvent()")),(0,l.kt)("blockquote",null,(0,l.kt)("p",{parentName:"blockquote"},"Method to make events for messages,\npass a user arg to specify the user making the event.\npass a type arg to specify the type of the event.\npass a all arg to specify the event is for all participant of the conversation message belongs to. ")),(0,l.kt)("pre",null,(0,l.kt)("code",{parentName:"pre",className:"language-php"},"$messages = $user->messages()->get();\n\n$messages->makeChatEvent(user: $user, type: 'delete', all: false);\n")))}m.isMDXComponent=!0}}]);