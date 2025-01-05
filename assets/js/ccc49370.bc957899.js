"use strict";(self.webpackChunkdocs=self.webpackChunkdocs||[]).push([[3249],{9178:(e,t,a)=>{a.d(t,{A:()=>b});var n=a(6540),l=a(53),r=a(5680),s=a(4798),i=a(4676),o=a(3155),m=a(8607),c=a(8139),d=a(6458);const g="blogPostTitle_d4p0",u="blogPostData_-Im+",p="blogPostDetailsFull_xD8n";const b=function(e){const t=function(){const{selectMessage:e}=(0,o.Ww)();return t=>{const a=Math.ceil(t);return e(a,(0,s.T)({id:"theme.blog.post.readingTime.plurals",description:'Pluralized label for "{readingTime} min read". Use as much plural forms (separated by "|") as your language support (see https://www.unicode.org/cldr/cldr-aux/charts/34/supplemental/language_plural_rules.html)',message:"One min read|{readingTime} min read"},{readingTime:a}))}}(),{children:a,frontMatter:b,metadata:E,truncated:v,isBlogPostPage:h=!1}=e,{date:_,formattedDate:f,permalink:N,tags:A,readingTime:k,title:I,editUrl:T}=E,{author:L,image:w,keywords:P}=b,C=b.author_url||b.authorURL,x=b.author_title||b.authorTitle,y=b.author_image_url||b.authorImageURL;return n.createElement(n.Fragment,null,n.createElement(c.A,{keywords:P,image:w}),n.createElement("article",{className:h?void 0:"margin-bottom--xl"},(()=>{const e=h?"h1":"h2";return n.createElement("header",null,n.createElement(e,{className:g},h?I:n.createElement(i.A,{to:N},I)),n.createElement("div",{className:(0,l.A)(u,"margin-vert--md")},n.createElement("time",{dateTime:_},f),k&&n.createElement(n.Fragment,null," \xb7 ",t(k))),n.createElement("div",{className:"avatar margin-vert--md"},y&&n.createElement(i.A,{className:"avatar__photo-link avatar__photo",href:C},n.createElement("img",{src:y,alt:L})),n.createElement("div",{className:"avatar__intro"},L&&n.createElement(n.Fragment,null,n.createElement("div",{className:"avatar__name"},n.createElement(i.A,{href:C},L)),n.createElement("small",{className:"avatar__subtitle"},x)))))})(),n.createElement("div",{className:"markdown"},n.createElement(r.xA,{components:m.A},a)),(A.length>0||v)&&n.createElement("footer",{className:(0,l.A)("row docusaurus-mt-lg",{[p]:h})},A.length>0&&n.createElement("div",{className:"col"},n.createElement("b",null,n.createElement(s.A,{id:"theme.tags.tagsListLabel",description:"The label alongside a tag list"},"Tags:")),A.map((e=>{let{label:t,permalink:a}=e;return n.createElement(i.A,{key:a,className:"margin-horiz--sm",to:a},t)}))),h&&T&&n.createElement("div",{className:"col margin-top--sm"},n.createElement(d.A,{editUrl:T})),!h&&v&&n.createElement("div",{className:"col text--right"},n.createElement(i.A,{to:E.permalink,"aria-label":`Read more about ${I}`},n.createElement("b",null,n.createElement(s.A,{id:"theme.blog.post.readMore",description:"The label used in blog post item excerpts to link to full blog posts"},"Read More")))))))}},2111:(e,t,a)=>{a.r(t),a.d(t,{default:()=>g});var n=a(6540),l=a(5241),r=a(9178),s=a(4798),i=a(4676);const o=function(e){const{nextItem:t,prevItem:a}=e;return n.createElement("nav",{className:"pagination-nav docusaurus-mt-lg","aria-label":(0,s.T)({id:"theme.blog.post.paginator.navAriaLabel",message:"Blog post page navigation",description:"The ARIA label for the blog posts pagination"})},n.createElement("div",{className:"pagination-nav__item"},a&&n.createElement(i.A,{className:"pagination-nav__link",to:a.permalink},n.createElement("div",{className:"pagination-nav__sublabel"},n.createElement(s.A,{id:"theme.blog.post.paginator.newerPost",description:"The blog post button label to navigate to the newer/previous post"},"Newer Post")),n.createElement("div",{className:"pagination-nav__label"},"\xab ",a.title))),n.createElement("div",{className:"pagination-nav__item pagination-nav__item--next"},t&&n.createElement(i.A,{className:"pagination-nav__link",to:t.permalink},n.createElement("div",{className:"pagination-nav__sublabel"},n.createElement(s.A,{id:"theme.blog.post.paginator.olderPost",description:"The blog post button label to navigate to the older/next post"},"Older Post")),n.createElement("div",{className:"pagination-nav__label"},t.title," \xbb"))))};var m=a(9937),c=a(1461),d=a(3155);const g=function(e){const{content:t,sidebar:a}=e,{frontMatter:s,metadata:i}=t,{title:g,description:u,nextItem:p,prevItem:b}=i,{hide_table_of_contents:E}=s;return n.createElement(l.A,{title:g,description:u,wrapperClassName:d.GN.wrapper.blogPages,pageClassName:d.GN.page.blogPostPage},t&&n.createElement("div",{className:"container margin-vert--lg"},n.createElement("div",{className:"row"},n.createElement("aside",{className:"col col--3"},n.createElement(m.A,{sidebar:a})),n.createElement("main",{className:"col col--7"},n.createElement(r.A,{frontMatter:s,metadata:i,isBlogPostPage:!0},n.createElement(t,null)),(p||b)&&n.createElement(o,{nextItem:p,prevItem:b})),!E&&t.toc&&n.createElement("div",{className:"col col--2"},n.createElement(c.A,{toc:t.toc})))))}},9937:(e,t,a)=>{a.d(t,{A:()=>o});var n=a(6540),l=a(53),r=a(4676);const s={sidebar:"sidebar_q+wC",sidebarItemTitle:"sidebarItemTitle_9G5K",sidebarItemList:"sidebarItemList_6T4b",sidebarItem:"sidebarItem_cjdF",sidebarItemLink:"sidebarItemLink_zyXk",sidebarItemLinkActive:"sidebarItemLinkActive_wcJs"};var i=a(4798);function o(e){let{sidebar:t}=e;return 0===t.items.length?null:n.createElement("nav",{className:(0,l.A)(s.sidebar,"thin-scrollbar"),"aria-label":(0,i.T)({id:"theme.blog.sidebar.navAriaLabel",message:"Blog recent posts navigation",description:"The ARIA label for recent posts in the blog sidebar"})},n.createElement("div",{className:(0,l.A)(s.sidebarItemTitle,"margin-bottom--md")},t.title),n.createElement("ul",{className:s.sidebarItemList},t.items.map((e=>n.createElement("li",{key:e.permalink,className:s.sidebarItem},n.createElement(r.A,{isNavLink:!0,to:e.permalink,className:s.sidebarItemLink,activeClassName:s.sidebarItemLinkActive},e.title))))))}},6458:(e,t,a)=>{a.d(t,{A:()=>m});var n=a(6540),l=a(4798),r=a(8168),s=a(53);const i="iconEdit_mS5F",o=e=>{let{className:t,...a}=e;return n.createElement("svg",(0,r.A)({fill:"currentColor",height:"20",width:"20",viewBox:"0 0 40 40",className:(0,s.A)(i,t),"aria-hidden":"true"},a),n.createElement("g",null,n.createElement("path",{d:"m34.5 11.7l-3 3.1-6.3-6.3 3.1-3q0.5-0.5 1.2-0.5t1.1 0.5l3.9 3.9q0.5 0.4 0.5 1.1t-0.5 1.2z m-29.5 17.1l18.4-18.5 6.3 6.3-18.4 18.4h-6.3v-6.2z"})))};function m(e){let{editUrl:t}=e;return n.createElement("a",{href:t,target:"_blank",rel:"noreferrer noopener"},n.createElement(o,null),n.createElement(l.A,{id:"theme.common.editThisPage",description:"The link label to edit the current page"},"Edit this page"))}},1461:(e,t,a)=>{a.d(t,{A:()=>m});var n=a(6540),l=a(53);const r=function(e,t,a){const[l,r]=(0,n.useState)(void 0);(0,n.useEffect)((()=>{function n(){const n=function(){const e=Array.from(document.getElementsByClassName("anchor")),t=e.find((e=>{const{top:t}=e.getBoundingClientRect();return t>=a}));if(t){if(t.getBoundingClientRect().top>=a){return e[e.indexOf(t)-1]??t}return t}return e[e.length-1]}();if(n){let a=0,s=!1;const i=document.getElementsByClassName(e);for(;a<i.length&&!s;){const e=i[a],{href:o}=e,m=decodeURIComponent(o.substring(o.indexOf("#")+1));n.id===m&&(l&&l.classList.remove(t),e.classList.add(t),r(e),s=!0),a+=1}}}return document.addEventListener("scroll",n),document.addEventListener("resize",n),n(),()=>{document.removeEventListener("scroll",n),document.removeEventListener("resize",n)}}))},s="tableOfContents_vrFS",i="table-of-contents__link";function o(e){let{toc:t,isChild:a}=e;return t.length?n.createElement("ul",{className:a?"":"table-of-contents table-of-contents__left-border"},t.map((e=>n.createElement("li",{key:e.id},n.createElement("a",{href:`#${e.id}`,className:i,dangerouslySetInnerHTML:{__html:e.value}}),n.createElement(o,{isChild:!0,toc:e.children}))))):null}const m=function(e){let{toc:t}=e;return r(i,"table-of-contents__link--active",100),n.createElement("div",{className:(0,l.A)(s,"thin-scrollbar")},n.createElement(o,{toc:t}))}}}]);