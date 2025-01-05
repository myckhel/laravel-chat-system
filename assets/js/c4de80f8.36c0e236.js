"use strict";(self.webpackChunkdocs=self.webpackChunkdocs||[]).push([[2777],{5680:(e,t,n)=>{n.d(t,{xA:()=>c,yg:()=>g});var r=n(6540);function a(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function i(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function s(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?i(Object(n),!0).forEach((function(t){a(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):i(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function l(e,t){if(null==e)return{};var n,r,a=function(e,t){if(null==e)return{};var n,r,a={},i=Object.keys(e);for(r=0;r<i.length;r++)n=i[r],t.indexOf(n)>=0||(a[n]=e[n]);return a}(e,t);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(e);for(r=0;r<i.length;r++)n=i[r],t.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(e,n)&&(a[n]=e[n])}return a}var o=r.createContext({}),p=function(e){var t=r.useContext(o),n=t;return e&&(n="function"==typeof e?e(t):s(s({},t),e)),n},c=function(e){var t=p(e.components);return r.createElement(o.Provider,{value:t},e.children)},d="mdxType",u={inlineCode:"code",wrapper:function(e){var t=e.children;return r.createElement(r.Fragment,{},t)}},h=r.forwardRef((function(e,t){var n=e.components,a=e.mdxType,i=e.originalType,o=e.parentName,c=l(e,["components","mdxType","originalType","parentName"]),d=p(n),h=a,g=d["".concat(o,".").concat(h)]||d[h]||u[h]||i;return n?r.createElement(g,s(s({ref:t},c),{},{components:n})):r.createElement(g,s({ref:t},c))}));function g(e,t){var n=arguments,a=t&&t.mdxType;if("string"==typeof e||a){var i=n.length,s=new Array(i);s[0]=h;var l={};for(var o in t)hasOwnProperty.call(t,o)&&(l[o]=t[o]);l.originalType=e,l[d]="string"==typeof e?e:a,s[1]=l;for(var p=2;p<i;p++)s[p]=n[p];return r.createElement.apply(null,s)}return r.createElement.apply(null,n)}h.displayName="MDXCreateElement"},1182:(e,t,n)=>{n.r(t),n.d(t,{contentTitle:()=>s,default:()=>d,frontMatter:()=>i,metadata:()=>l,toc:()=>o});var r=n(8168),a=(n(6540),n(5680));const i={id:"install",title:"Installation",sidebar_label:"Installation",slug:"/install"},s=void 0,l={unversionedId:"install",id:"install",isDocsHomePage:!1,title:"Installation",description:"Install",source:"@site/docs/install.md",sourceDirName:".",slug:"/install",permalink:"/laravel-chat-system/docs/next/install",editUrl:"https://github.com/binkode/laravel-chat-system-docs/edit/master/docs/install.md",version:"current",frontMatter:{id:"install",title:"Installation",sidebar_label:"Installation",slug:"/install"},sidebar:"docs",previous:{title:"Introduction",permalink:"/laravel-chat-system/docs/next/"},next:{title:"Requirements",permalink:"/laravel-chat-system/docs/next/requirements"}},o=[{value:"<code>Install</code>",id:"install",children:[]},{value:"<code>Setup</code>",id:"setup",children:[{value:"Publishing the config file",id:"publishing-the-config-file",children:[]},{value:"Publishing the migrations files",id:"publishing-the-migrations-files",children:[]},{value:"Publishing the seeders files",id:"publishing-the-seeders-files",children:[]},{value:"Publishing the factories files",id:"publishing-the-factories-files",children:[]},{value:"Publishing all resources files",id:"publishing-all-resources-files",children:[]}]},{value:"<code>Setup User Model</code>",id:"setup-user-model",children:[]}],p={toc:o},c="wrapper";function d(e){let{components:t,...n}=e;return(0,a.yg)(c,(0,r.A)({},p,n,{components:t,mdxType:"MDXLayout"}),(0,a.yg)("h2",{id:"install"},(0,a.yg)("inlineCode",{parentName:"h2"},"Install")),(0,a.yg)("p",null,"Via Composer"),(0,a.yg)("pre",null,(0,a.yg)("code",{parentName:"pre",className:"language-bash"},"composer require binkode/laravel-chat-system\n")),(0,a.yg)("h2",{id:"setup"},(0,a.yg)("inlineCode",{parentName:"h2"},"Setup")),(0,a.yg)("h3",{id:"publishing-the-config-file"},"Publishing the config file"),(0,a.yg)("pre",null,(0,a.yg)("code",{parentName:"pre",className:"language-bash"},"php artisan vendor:publish --provider=\"Binkode\\ChatSystem\\ChatSystemServiceProvider\" --tag='config'\n")),(0,a.yg)("p",null,(0,a.yg)("inlineCode",{parentName:"p"},"chat-system.php")," should be copied to the ",(0,a.yg)("inlineCode",{parentName:"p"},"config")," directory"),(0,a.yg)("h3",{id:"publishing-the-migrations-files"},"Publishing the migrations files"),(0,a.yg)("pre",null,(0,a.yg)("code",{parentName:"pre",className:"language-bash"},"php artisan vendor:publish --provider=\"Binkode\\ChatSystem\\ChatSystemServiceProvider\" --tag='migrations'\n")),(0,a.yg)("p",null,"migration files should be copied to the ",(0,a.yg)("inlineCode",{parentName:"p"},"database/migrations")," directory"),(0,a.yg)("h3",{id:"publishing-the-seeders-files"},"Publishing the seeders files"),(0,a.yg)("pre",null,(0,a.yg)("code",{parentName:"pre",className:"language-bash"},"php artisan vendor:publish --provider=\"Binkode\\ChatSystem\\ChatSystemServiceProvider\" --tag='seeders'\n")),(0,a.yg)("p",null,"seeders files should be copied to the ",(0,a.yg)("inlineCode",{parentName:"p"},"database/seeders")," directory"),(0,a.yg)("h3",{id:"publishing-the-factories-files"},"Publishing the factories files"),(0,a.yg)("pre",null,(0,a.yg)("code",{parentName:"pre",className:"language-bash"},"php artisan vendor:publish --provider=\"Binkode\\ChatSystem\\ChatSystemServiceProvider\" --tag='factories'\n")),(0,a.yg)("p",null,"factories files should be copied to the ",(0,a.yg)("inlineCode",{parentName:"p"},"database/factories")," directory"),(0,a.yg)("h3",{id:"publishing-all-resources-files"},"Publishing all resources files"),(0,a.yg)("pre",null,(0,a.yg)("code",{parentName:"pre",className:"language-bash"},'php artisan vendor:publish --provider="Binkode\\ChatSystem\\ChatSystemServiceProvider"\n')),(0,a.yg)("p",null,"all resources files should be copied to the respective directories"),(0,a.yg)("h2",{id:"setup-user-model"},(0,a.yg)("inlineCode",{parentName:"h2"},"Setup User Model")),(0,a.yg)("p",null,"In order to start working with chat-system, you need to setup your User model by implementing ",(0,a.yg)("strong",{parentName:"p"},"IChatEventMaker")," Interface and using the ",(0,a.yg)("a",{parentName:"p",href:"/laravel-chat-system/docs/next/apis/traits/message/hasMessage"},"HasMessage"),", ",(0,a.yg)("a",{parentName:"p",href:"/laravel-chat-system/docs/next/apis/traits/chatEvent/canMakeChatEvent"},"CanMakeChatEvent")," Traits."),(0,a.yg)("pre",null,(0,a.yg)("code",{parentName:"pre",className:"language-php"},"use Binkode\\ChatSystem\\Traits\\Message\\HasMessage;\nuse Binkode\\ChatSystem\\Traits\\ChatEvent\\CanMakeChatEvent;\nuse Binkode\\ChatSystem\\Contracts\\IChatEventMaker;\n\n\nclass User implements IChatEventMaker\n{\n    use HasMessage, CanMakeChatEvent;\n...\n")))}d.isMDXComponent=!0}}]);