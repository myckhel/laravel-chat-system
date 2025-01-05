"use strict";(self.webpackChunkdocs=self.webpackChunkdocs||[]).push([[9922],{5680:(e,t,r)=>{r.d(t,{xA:()=>p,yg:()=>g});var i=r(6540);function n(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}function l(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(e);t&&(i=i.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,i)}return r}function a(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?l(Object(r),!0).forEach((function(t){n(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):l(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function s(e,t){if(null==e)return{};var r,i,n=function(e,t){if(null==e)return{};var r,i,n={},l=Object.keys(e);for(i=0;i<l.length;i++)r=l[i],t.indexOf(r)>=0||(n[r]=e[r]);return n}(e,t);if(Object.getOwnPropertySymbols){var l=Object.getOwnPropertySymbols(e);for(i=0;i<l.length;i++)r=l[i],t.indexOf(r)>=0||Object.prototype.propertyIsEnumerable.call(e,r)&&(n[r]=e[r])}return n}var o=i.createContext({}),c=function(e){var t=i.useContext(o),r=t;return e&&(r="function"==typeof e?e(t):a(a({},t),e)),r},p=function(e){var t=c(e.components);return i.createElement(o.Provider,{value:t},e.children)},d="mdxType",u={inlineCode:"code",wrapper:function(e){var t=e.children;return i.createElement(i.Fragment,{},t)}},h=i.forwardRef((function(e,t){var r=e.components,n=e.mdxType,l=e.originalType,o=e.parentName,p=s(e,["components","mdxType","originalType","parentName"]),d=c(r),h=n,g=d["".concat(o,".").concat(h)]||d[h]||u[h]||l;return r?i.createElement(g,a(a({ref:t},p),{},{components:r})):i.createElement(g,a({ref:t},p))}));function g(e,t){var r=arguments,n=t&&t.mdxType;if("string"==typeof e||n){var l=r.length,a=new Array(l);a[0]=h;var s={};for(var o in t)hasOwnProperty.call(t,o)&&(s[o]=t[o]);s.originalType=e,s[d]="string"==typeof e?e:n,a[1]=s;for(var c=2;c<l;c++)a[c]=r[c];return i.createElement.apply(null,a)}return i.createElement.apply(null,r)}h.displayName="MDXCreateElement"},385:(e,t,r)=>{r.r(t),r.d(t,{contentTitle:()=>a,default:()=>d,frontMatter:()=>l,metadata:()=>s,toc:()=>o});var i=r(8168),n=(r(6540),r(5680));const l={id:"install",title:"Installation",sidebar_label:"Installation",slug:"/install"},a=void 0,s={unversionedId:"install",id:"version-v1.0-alpha.3/install",isDocsHomePage:!1,title:"Installation",description:"Install",source:"@site/versioned_docs/version-v1.0-alpha.3/install.md",sourceDirName:".",slug:"/install",permalink:"/laravel-chat-system/docs/v1.0-alpha.3/install",editUrl:"https://github.com/binkode/laravel-chat-system-docs/edit/master/versioned_docs/version-v1.0-alpha.3/install.md",version:"v1.0-alpha.3",frontMatter:{id:"install",title:"Installation",sidebar_label:"Installation",slug:"/install"},sidebar:"version-v1.0-alpha.3/docs",previous:{title:"Introduction",permalink:"/laravel-chat-system/docs/v1.0-alpha.3/"},next:{title:"Requirements",permalink:"/laravel-chat-system/docs/v1.0-alpha.3/requirements"}},o=[{value:"<code>Install</code>",id:"install",children:[]},{value:"<code>Setup</code>",id:"setup",children:[{value:"Publishing the config file",id:"publishing-the-config-file",children:[]},{value:"Publishing the migrations files",id:"publishing-the-migrations-files",children:[]},{value:"Publishing the seeders files",id:"publishing-the-seeders-files",children:[]},{value:"Publishing the factories files",id:"publishing-the-factories-files",children:[]},{value:"Publishing all resources files",id:"publishing-all-resources-files",children:[]}]}],c={toc:o},p="wrapper";function d(e){let{components:t,...r}=e;return(0,n.yg)(p,(0,i.A)({},c,r,{components:t,mdxType:"MDXLayout"}),(0,n.yg)("h2",{id:"install"},(0,n.yg)("inlineCode",{parentName:"h2"},"Install")),(0,n.yg)("p",null,"Via Composer"),(0,n.yg)("pre",null,(0,n.yg)("code",{parentName:"pre",className:"language-bash"},"composer require myckhel/laravel-chat-system\n")),(0,n.yg)("h2",{id:"setup"},(0,n.yg)("inlineCode",{parentName:"h2"},"Setup")),(0,n.yg)("h3",{id:"publishing-the-config-file"},"Publishing the config file"),(0,n.yg)("pre",null,(0,n.yg)("code",{parentName:"pre",className:"language-bash"},"php artisan vendor:publish --provider=\"Myckhel\\ChatSystem\\ChatSystemServiceProvider\" --tag='config'\n")),(0,n.yg)("p",null,(0,n.yg)("inlineCode",{parentName:"p"},"chat-system.php")," should be copied to the ",(0,n.yg)("inlineCode",{parentName:"p"},"config")," directory"),(0,n.yg)("h3",{id:"publishing-the-migrations-files"},"Publishing the migrations files"),(0,n.yg)("pre",null,(0,n.yg)("code",{parentName:"pre",className:"language-bash"},"php artisan vendor:publish --provider=\"Myckhel\\ChatSystem\\ChatSystemServiceProvider\" --tag='migrations'\n")),(0,n.yg)("p",null,"migration files should be copied to the ",(0,n.yg)("inlineCode",{parentName:"p"},"database/migrations")," directory"),(0,n.yg)("h3",{id:"publishing-the-seeders-files"},"Publishing the seeders files"),(0,n.yg)("pre",null,(0,n.yg)("code",{parentName:"pre",className:"language-bash"},"php artisan vendor:publish --provider=\"Myckhel\\ChatSystem\\ChatSystemServiceProvider\" --tag='seeders'\n")),(0,n.yg)("p",null,"seeders files should be copied to the ",(0,n.yg)("inlineCode",{parentName:"p"},"database/seeders")," directory"),(0,n.yg)("h3",{id:"publishing-the-factories-files"},"Publishing the factories files"),(0,n.yg)("pre",null,(0,n.yg)("code",{parentName:"pre",className:"language-bash"},"php artisan vendor:publish --provider=\"Myckhel\\ChatSystem\\ChatSystemServiceProvider\" --tag='factories'\n")),(0,n.yg)("p",null,"factories files should be copied to the ",(0,n.yg)("inlineCode",{parentName:"p"},"database/factories")," directory"),(0,n.yg)("h3",{id:"publishing-all-resources-files"},"Publishing all resources files"),(0,n.yg)("pre",null,(0,n.yg)("code",{parentName:"pre",className:"language-bash"},'php artisan vendor:publish --provider="Myckhel\\ChatSystem\\ChatSystemServiceProvider"\n')),(0,n.yg)("p",null,"all resources files should be copied to the respective directories"))}d.isMDXComponent=!0}}]);