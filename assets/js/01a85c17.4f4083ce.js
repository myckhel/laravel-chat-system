"use strict";(self.webpackChunkdocs=self.webpackChunkdocs||[]).push([[8209],{9937:(e,t,a)=>{a.d(t,{A:()=>m});var s=a(6540),r=a(53),i=a(4676);const l={sidebar:"sidebar_q+wC",sidebarItemTitle:"sidebarItemTitle_9G5K",sidebarItemList:"sidebarItemList_6T4b",sidebarItem:"sidebarItem_cjdF",sidebarItemLink:"sidebarItemLink_zyXk",sidebarItemLinkActive:"sidebarItemLinkActive_wcJs"};var n=a(4798);function m(e){let{sidebar:t}=e;return 0===t.items.length?null:s.createElement("nav",{className:(0,r.A)(l.sidebar,"thin-scrollbar"),"aria-label":(0,n.T)({id:"theme.blog.sidebar.navAriaLabel",message:"Blog recent posts navigation",description:"The ARIA label for recent posts in the blog sidebar"})},s.createElement("div",{className:(0,r.A)(l.sidebarItemTitle,"margin-bottom--md")},t.title),s.createElement("ul",{className:l.sidebarItemList},t.items.map((e=>s.createElement("li",{key:e.permalink,className:l.sidebarItem},s.createElement(i.A,{isNavLink:!0,to:e.permalink,className:l.sidebarItemLink,activeClassName:l.sidebarItemLinkActive},e.title))))))}},3395:(e,t,a)=>{a.r(t),a.d(t,{default:()=>c});var s=a(6540),r=a(5241),i=a(4676),l=a(9937),n=a(4798),m=a(3155);const c=function(e){const{tags:t,sidebar:a}=e,c=(0,n.T)({id:"theme.tags.tagsPageTitle",message:"Tags",description:"The title of the tag list page"}),d={};Object.keys(t).forEach((e=>{const t=function(e){return e[0].toUpperCase()}(e);d[t]=d[t]||[],d[t].push(e)}));const o=Object.entries(d).sort(((e,t)=>{let[a]=e,[s]=t;return a.localeCompare(s)})).map((e=>{let[a,r]=e;return s.createElement("article",{key:a},s.createElement("h2",null,a),r.map((e=>s.createElement(i.A,{className:"padding-right--md",href:t[e].permalink,key:e},t[e].name," (",t[e].count,")"))),s.createElement("hr",null))})).filter((e=>null!=e));return s.createElement(r.A,{title:c,wrapperClassName:m.GN.wrapper.blogPages,pageClassName:m.GN.page.blogTagsListPage,searchMetadatas:{tag:"blog_tags_list"}},s.createElement("div",{className:"container margin-vert--lg"},s.createElement("div",{className:"row"},s.createElement("aside",{className:"col col--3"},s.createElement(l.A,{sidebar:a})),s.createElement("main",{className:"col col--7"},s.createElement("h1",null,c),s.createElement("section",{className:"margin-vert--lg"},o)))))}}}]);