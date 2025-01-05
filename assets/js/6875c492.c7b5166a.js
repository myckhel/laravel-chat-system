"use strict";(self.webpackChunkdocs=self.webpackChunkdocs||[]).push([[4813],{9178:(e,t,a)=>{a.d(t,{A:()=>p});var l=a(6540),r=a(53),s=a(5680),n=a(4798),m=a(4676),i=a(3155),c=a(8607),o=a(8139),d=a(6458);const g="blogPostTitle_d4p0",u="blogPostData_-Im+",h="blogPostDetailsFull_xD8n";const p=function(e){const t=function(){const{selectMessage:e}=(0,i.Ww)();return t=>{const a=Math.ceil(t);return e(a,(0,n.T)({id:"theme.blog.post.readingTime.plurals",description:'Pluralized label for "{readingTime} min read". Use as much plural forms (separated by "|") as your language support (see https://www.unicode.org/cldr/cldr-aux/charts/34/supplemental/language_plural_rules.html)',message:"One min read|{readingTime} min read"},{readingTime:a}))}}(),{children:a,frontMatter:p,metadata:b,truncated:E,isBlogPostPage:v=!1}=e,{date:A,formattedDate:N,permalink:_,tags:k,readingTime:f,title:T,editUrl:w}=b,{author:I,image:L,keywords:P}=p,y=p.author_url||p.authorURL,x=p.author_title||p.authorTitle,M=p.author_image_url||p.authorImageURL;return l.createElement(l.Fragment,null,l.createElement(o.A,{keywords:P,image:L}),l.createElement("article",{className:v?void 0:"margin-bottom--xl"},(()=>{const e=v?"h1":"h2";return l.createElement("header",null,l.createElement(e,{className:g},v?T:l.createElement(m.A,{to:_},T)),l.createElement("div",{className:(0,r.A)(u,"margin-vert--md")},l.createElement("time",{dateTime:A},N),f&&l.createElement(l.Fragment,null," \xb7 ",t(f))),l.createElement("div",{className:"avatar margin-vert--md"},M&&l.createElement(m.A,{className:"avatar__photo-link avatar__photo",href:y},l.createElement("img",{src:M,alt:I})),l.createElement("div",{className:"avatar__intro"},I&&l.createElement(l.Fragment,null,l.createElement("div",{className:"avatar__name"},l.createElement(m.A,{href:y},I)),l.createElement("small",{className:"avatar__subtitle"},x)))))})(),l.createElement("div",{className:"markdown"},l.createElement(s.xA,{components:c.A},a)),(k.length>0||E)&&l.createElement("footer",{className:(0,r.A)("row docusaurus-mt-lg",{[h]:v})},k.length>0&&l.createElement("div",{className:"col"},l.createElement("b",null,l.createElement(n.A,{id:"theme.tags.tagsListLabel",description:"The label alongside a tag list"},"Tags:")),k.map((e=>{let{label:t,permalink:a}=e;return l.createElement(m.A,{key:a,className:"margin-horiz--sm",to:a},t)}))),v&&w&&l.createElement("div",{className:"col margin-top--sm"},l.createElement(d.A,{editUrl:w})),!v&&E&&l.createElement("div",{className:"col text--right"},l.createElement(m.A,{to:b.permalink,"aria-label":`Read more about ${T}`},l.createElement("b",null,l.createElement(n.A,{id:"theme.blog.post.readMore",description:"The label used in blog post item excerpts to link to full blog posts"},"Read More")))))))}},9937:(e,t,a)=>{a.d(t,{A:()=>i});var l=a(6540),r=a(53),s=a(4676);const n={sidebar:"sidebar_q+wC",sidebarItemTitle:"sidebarItemTitle_9G5K",sidebarItemList:"sidebarItemList_6T4b",sidebarItem:"sidebarItem_cjdF",sidebarItemLink:"sidebarItemLink_zyXk",sidebarItemLinkActive:"sidebarItemLinkActive_wcJs"};var m=a(4798);function i(e){let{sidebar:t}=e;return 0===t.items.length?null:l.createElement("nav",{className:(0,r.A)(n.sidebar,"thin-scrollbar"),"aria-label":(0,m.T)({id:"theme.blog.sidebar.navAriaLabel",message:"Blog recent posts navigation",description:"The ARIA label for recent posts in the blog sidebar"})},l.createElement("div",{className:(0,r.A)(n.sidebarItemTitle,"margin-bottom--md")},t.title),l.createElement("ul",{className:n.sidebarItemList},t.items.map((e=>l.createElement("li",{key:e.permalink,className:n.sidebarItem},l.createElement(s.A,{isNavLink:!0,to:e.permalink,className:n.sidebarItemLink,activeClassName:n.sidebarItemLinkActive},e.title))))))}},6033:(e,t,a)=>{a.r(t),a.d(t,{default:()=>o});var l=a(6540),r=a(5241),s=a(9178),n=a(4676),m=a(9937),i=a(4798),c=a(3155);const o=function(e){const{metadata:t,items:a,sidebar:o}=e,{allTagsPath:d,name:g,count:u}=t,h=function(){const{selectMessage:e}=(0,c.Ww)();return t=>e(t,(0,i.T)({id:"theme.blog.post.plurals",description:'Pluralized label for "{count} posts". Use as much plural forms (separated by "|") as your language support (see https://www.unicode.org/cldr/cldr-aux/charts/34/supplemental/language_plural_rules.html)',message:"One post|{count} posts"},{count:t}))}(),p=(0,i.T)({id:"theme.blog.tagTitle",description:"The title of the page for a blog tag",message:'{nPosts} tagged with "{tagName}"'},{nPosts:h(u),tagName:g});return l.createElement(r.A,{title:p,wrapperClassName:c.GN.wrapper.blogPages,pageClassName:c.GN.page.blogTagsPostPage,searchMetadatas:{tag:"blog_tags_posts"}},l.createElement("div",{className:"container margin-vert--lg"},l.createElement("div",{className:"row"},l.createElement("aside",{className:"col col--3"},l.createElement(m.A,{sidebar:o})),l.createElement("main",{className:"col col--7"},l.createElement("header",{className:"margin-bottom--xl"},l.createElement("h1",null,p),l.createElement(n.A,{href:d},l.createElement(i.A,{id:"theme.tags.tagsPageLink",description:"The label of the link targeting the tag list page"},"View All Tags"))),a.map((e=>{let{content:t}=e;return l.createElement(s.A,{key:t.metadata.permalink,frontMatter:t.frontMatter,metadata:t.metadata,truncated:!0},l.createElement(t,null))}))))))}},6458:(e,t,a)=>{a.d(t,{A:()=>c});var l=a(6540),r=a(4798),s=a(8168),n=a(53);const m="iconEdit_mS5F",i=e=>{let{className:t,...a}=e;return l.createElement("svg",(0,s.A)({fill:"currentColor",height:"20",width:"20",viewBox:"0 0 40 40",className:(0,n.A)(m,t),"aria-hidden":"true"},a),l.createElement("g",null,l.createElement("path",{d:"m34.5 11.7l-3 3.1-6.3-6.3 3.1-3q0.5-0.5 1.2-0.5t1.1 0.5l3.9 3.9q0.5 0.4 0.5 1.1t-0.5 1.2z m-29.5 17.1l18.4-18.5 6.3 6.3-18.4 18.4h-6.3v-6.2z"})))};function c(e){let{editUrl:t}=e;return l.createElement("a",{href:t,target:"_blank",rel:"noreferrer noopener"},l.createElement(i,null),l.createElement(r.A,{id:"theme.common.editThisPage",description:"The link label to edit the current page"},"Edit this page"))}}}]);