"use strict";(self.webpackChunkdocs=self.webpackChunkdocs||[]).push([[9239],{5680:(e,n,t)=>{t.d(n,{xA:()=>p,yg:()=>v});var r=t(6540);function a(e,n,t){return n in e?Object.defineProperty(e,n,{value:t,enumerable:!0,configurable:!0,writable:!0}):e[n]=t,e}function o(e,n){var t=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);n&&(r=r.filter((function(n){return Object.getOwnPropertyDescriptor(e,n).enumerable}))),t.push.apply(t,r)}return t}function i(e){for(var n=1;n<arguments.length;n++){var t=null!=arguments[n]?arguments[n]:{};n%2?o(Object(t),!0).forEach((function(n){a(e,n,t[n])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(t)):o(Object(t)).forEach((function(n){Object.defineProperty(e,n,Object.getOwnPropertyDescriptor(t,n))}))}return e}function s(e,n){if(null==e)return{};var t,r,a=function(e,n){if(null==e)return{};var t,r,a={},o=Object.keys(e);for(r=0;r<o.length;r++)t=o[r],n.indexOf(t)>=0||(a[t]=e[t]);return a}(e,n);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);for(r=0;r<o.length;r++)t=o[r],n.indexOf(t)>=0||Object.prototype.propertyIsEnumerable.call(e,t)&&(a[t]=e[t])}return a}var c=r.createContext({}),l=function(e){var n=r.useContext(c),t=n;return e&&(t="function"==typeof e?e(n):i(i({},n),e)),t},p=function(e){var n=l(e.components);return r.createElement(c.Provider,{value:n},e.children)},u="mdxType",g={inlineCode:"code",wrapper:function(e){var n=e.children;return r.createElement(r.Fragment,{},n)}},d=r.forwardRef((function(e,n){var t=e.components,a=e.mdxType,o=e.originalType,c=e.parentName,p=s(e,["components","mdxType","originalType","parentName"]),u=l(t),d=a,v=u["".concat(c,".").concat(d)]||u[d]||g[d]||o;return t?r.createElement(v,i(i({ref:n},p),{},{components:t})):r.createElement(v,i({ref:n},p))}));function v(e,n){var t=arguments,a=n&&n.mdxType;if("string"==typeof e||a){var o=t.length,i=new Array(o);i[0]=d;var s={};for(var c in n)hasOwnProperty.call(n,c)&&(s[c]=n[c]);s.originalType=e,s[u]="string"==typeof e?e:a,i[1]=s;for(var l=2;l<o;l++)i[l]=t[l];return r.createElement.apply(null,i)}return r.createElement.apply(null,t)}d.displayName="MDXCreateElement"},5264:(e,n,t)=>{t.r(n),t.d(n,{contentTitle:()=>i,default:()=>u,frontMatter:()=>o,metadata:()=>s,toc:()=>c});var r=t(8168),a=(t(6540),t(5680));const o={id:"guides.conversation",title:"Using Conversation",sidebar_label:"Using Conversation",slug:"/guides/conversation"},i=void 0,s={unversionedId:"guides/guides.conversation",id:"guides/guides.conversation",isDocsHomePage:!1,title:"Using Conversation",description:"Creating conversation",source:"@site/docs/guides/conversation.md",sourceDirName:"guides",slug:"/guides/conversation",permalink:"/laravel-chat-system/docs/next/guides/conversation",editUrl:"https://github.com/binkode/laravel-chat-system-docs/edit/master/docs/guides/conversation.md",version:"current",frontMatter:{id:"guides.conversation",title:"Using Conversation",sidebar_label:"Using Conversation",slug:"/guides/conversation"},sidebar:"docs",previous:{title:"Using Routes",permalink:"/laravel-chat-system/docs/next/guides/routes"},next:{title:"Using Message",permalink:"/laravel-chat-system/docs/next/guides/message"}},c=[{value:"Creating conversation",id:"creating-conversation",children:[]},{value:"Creating conversation type",id:"creating-conversation-type",children:[]},{value:"Adding/removing user/participant to conversation",id:"addingremoving-userparticipant-to-conversation",children:[]},{value:"Deleting conversation",id:"deleting-conversation",children:[]}],l={toc:c},p="wrapper";function u(e){let{components:n,...t}=e;return(0,a.yg)(p,(0,r.A)({},l,t,{components:n,mdxType:"MDXLayout"}),(0,a.yg)("h2",{id:"creating-conversation"},"Creating conversation"),(0,a.yg)("p",null,"When conversation is created, the system will automatically add the creator as a participant of the conversation using the ",(0,a.yg)("inlineCode",{parentName:"p"},"conversation.user_id")," if only the chatSystem Observer have been registered. see ",(0,a.yg)("a",{parentName:"p",href:"providers#registering-observers"},"registering-observers")," "),(0,a.yg)("pre",null,(0,a.yg)("code",{parentName:"pre",className:"language-php"},"$conversation = $user->conversations()->create([\n  'user_id' => $user->id,\n]);\n")),(0,a.yg)("details",null,(0,a.yg)("summary",null,"output"),(0,a.yg)("pre",null,(0,a.yg)("code",{parentName:"pre",className:"language-json"},'// conversation\n{\n  "id": 297,\n  "user_id": 13,\n  "type": "private",\n  "updated_at": "2021-07-14T18:59:44.000000Z",\n  "created_at": "2021-07-14T18:59:44.000000Z"\n}\n'))),(0,a.yg)("h2",{id:"creating-conversation-type"},"Creating conversation type"),(0,a.yg)("p",null,"You may create a conversation of another type such as ",(0,a.yg)("inlineCode",{parentName:"p"},"group")," and should have a name."),(0,a.yg)("pre",null,(0,a.yg)("code",{parentName:"pre",className:"language-php"},"$conversation = $user->conversations()->create([\n  'user_id' => $user->id,\n  'type'    => 'group',\n  'name'    => 'Laravel Developer\\'s Group',\n]);\n")),(0,a.yg)("details",null,(0,a.yg)("summary",null,"output"),(0,a.yg)("pre",null,(0,a.yg)("code",{parentName:"pre",className:"language-json"},'// conversation\n{\n  "id": 297,\n  "user_id": 13,\n  "type": "group",\n  "name": "Laravel Developer\\\'s Group",\n  "updated_at": "2021-07-14T18:59:44.000000Z",\n  "created_at": "2021-07-14T18:59:44.000000Z"\n}\n'))),(0,a.yg)("h2",{id:"addingremoving-userparticipant-to-conversation"},"Adding/removing user/participant to conversation"),(0,a.yg)("p",null,"You may add as many participants to a conversation but its not a good idea for a conversation of type ",(0,a.yg)("inlineCode",{parentName:"p"},"private")," to have more than 2 participants.\nThe function will also create a message of type = activity. pass a message argument to customise the activity message."),(0,a.yg)("pre",null,(0,a.yg)("code",{parentName:"pre",className:"language-php"},"$conversation->addParticipant($user, message: 'Someone joined the conversation');\n$conversation->removeParticipant($user, message: 'Someone left the conversation');\n")),(0,a.yg)("h2",{id:"deleting-conversation"},"Deleting conversation"),(0,a.yg)("p",null,"You may delete conversation with ",(0,a.yg)("a",{parentName:"p",href:"../apis/models/conversation#makedelete"},"makeDelete")," method which requires 1 argument = user deleting the conversation.\nYou can specify delete for all option by passing named argument ",(0,a.yg)("inlineCode",{parentName:"p"},"all")," which will specify that the conversation has been deleted for all participants.\nThe method will also try to emit ",(0,a.yg)("a",{parentName:"p",href:"../apis/events/message/events"},"Message Events")),(0,a.yg)("pre",null,(0,a.yg)("code",{parentName:"pre",className:"language-php"},"$conversation->makeDelete($user, all: true);\n")))}u.isMDXComponent=!0}}]);