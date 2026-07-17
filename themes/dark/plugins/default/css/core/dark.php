/******************************************************************
 * OSSN Dark theme — colour override
 * Loaded after the base stylesheet so these rules win.
 * Only colours/surfaces are changed here; layout is inherited.
 ******************************************************************/
:root {
	--dk-bg:        #171717; /* page background            */
	--dk-surface:   #1e1e1e; /* cards, topbar, sidebar     */
	--dk-surface-2: #26292b; /* sub-surfaces, hovers       */
	--dk-border:    #33383b; /* borders / dividers         */
	--dk-text:      #abb8c3; /* primary text               */
	--dk-muted:     #7c8894; /* secondary/muted text       */
	--dk-accent:    #008cb4; /* links / accents (kept blue)*/
	--dk-accent-2:  #00728f; /* darker accent              */
}

/* ---- Base ---- */
body {
	background-color: var(--dk-bg) !important;
	color: var(--dk-text);
}
a { color: var(--dk-text); }
a:hover { color: var(--dk-accent); }

/* Scrollbars */
::-webkit-scrollbar-track { background-color: var(--dk-bg); border-left: 1px solid var(--dk-border); }
::-webkit-scrollbar-thumb { background-color: #3a424c; }
::-webkit-scrollbar-thumb:hover { background-color: #4a545f; }

/* ---- Top bar ---- */
.topbar,
.ossn-topbar,
#ossn-topbar {
	background-color: var(--dk-surface) !important;
	border-bottom: 1px solid var(--dk-border);
}
.topbar a,
.topbar .text,
.topbar-menu-left a,
.topbar-menu-right a { color: var(--dk-text); }

/* ---- Sidebar / left nav ---- */
.sidebar,
.sidebar-menu-nav,
.home-left-contents {
	background-color: var(--dk-surface) !important;
	color: var(--dk-text);
	border-color: var(--dk-border);
}
.sidebar a,
.sidebar-menu-nav a,
.sidebar-menu-nav .text { color: var(--dk-text); }
.sidebar-menu-nav a:hover,
.sidebar-menu-nav li:hover { background-color: var(--dk-surface-2); }

/* ---- Page containers ---- */
.sidebar-open-page-container,
.sidebar-open-page-container-no-annimation,
.sidebar-close-page-container,
.ossn-page-container,
.ossn-home-container,
.ossn-layout-newsfeed { background-color: var(--dk-bg) !important; }

/* ---- Cards / modules / widgets ---- */
.ossn-widget,
.ossn-layout-module,
.ossn-message-box,
.ossn-layout-media,
.ossn-layout-media .content,
.ossn-users-list-item,
.ossn-output-users-list,
.newsfeed-user-info-top,
.ossn-search-page,
.ossn-viewer,
.ossn-privacy {
	background-color: var(--dk-surface) !important;
	color: var(--dk-text);
	border-color: var(--dk-border) !important;
}

/* Generic light panels used across components */
.ossn-network-viewer,
.ossn-wall-container,
.ossn-comments-container,
.ossn-group-info,
.ossn-widget-container {
	background-color: var(--dk-surface) !important;
	color: var(--dk-text);
	border-color: var(--dk-border) !important;
}

/* ---- Dropdowns / menus ---- */
.ossn-topbar-dropdown-menu,
.dropdown-submenu,
.sub-menu,
.ossn-menu-search,
.dropdown-menu {
	background-color: var(--dk-surface-2) !important;
	color: var(--dk-text);
	border: 1px solid var(--dk-border);
}
.ossn-topbar-dropdown-menu a,
.dropdown-menu a,
.sub-menu a { color: var(--dk-text); }
.ossn-topbar-dropdown-menu a:hover,
.dropdown-menu a:hover,
.sub-menu a:hover { background-color: #2c343d; }

/* ---- Forms ---- */
.ossn-form input[type='text'],
.ossn-form input[type='password'],
.ossn-form input[type='email'],
.ossn-form input[type='number'],
.ossn-form input[type='search'],
.ossn-form input[type='url'],
.ossn-form textarea,
.ossn-form select,
input.form-control,
textarea.form-control,
select.form-control {
	background-color: #161616 !important;
	color: var(--dk-text) !important;
	border: 1px solid var(--dk-border) !important;
}
.ossn-form textarea:focus,
.ossn-form input:focus,
.form-control:focus {
	background-color: #161616 !important;
	border-color: var(--dk-accent) !important;
	color: var(--dk-text) !important;
}
::placeholder { color: var(--dk-muted) !important; }

/* ---- Text helpers ---- */
h1, h2, h3, h4, h5, h6 { color: var(--dk-text); }
.ossn-text-grey,
.text-muted,
small,
.ossn-comments-time,
.newsfeed-time { color: var(--dk-muted) !important; }

/* ---- Tables ---- */
table, .table { color: var(--dk-text); }
.table td, .table th,
table td, table th { border-color: var(--dk-border) !important; }
.table-striped tbody tr:nth-of-type(odd) { background-color: var(--dk-surface-2); }

/* ---- Pagination ---- */
.page-link {
	background-color: var(--dk-surface-2) !important;
	color: var(--dk-text) !important;
	border-color: var(--dk-border) !important;
}
.page-item.active .page-link {
	background-color: var(--dk-accent-2) !important;
	border-color: var(--dk-accent-2) !important;
	color: #fff !important;
}

/* ---- Secondary/default buttons (keep primary/accent buttons intact) ---- */
.ossn-button-grey,
.btn-secondary,
.btn-default {
	background-color: var(--dk-surface-2) !important;
	color: var(--dk-text) !important;
	border-color: var(--dk-border) !important;
}

/* ---- Generic bootstrap surfaces used by components ---- */
.card, .modal-content, .list-group-item, .popover {
	background-color: var(--dk-surface) !important;
	color: var(--dk-text) !important;
	border-color: var(--dk-border) !important;
}
.modal-header, .modal-footer, .card-header, .card-footer {
	background-color: var(--dk-surface-2) !important;
	border-color: var(--dk-border) !important;
}
hr { border-color: var(--dk-border); }

/* ---- Wall / posts (OssnWall) ---- */
.ossn-wall-container,
.ossn-wall,
.ossn-wall-item,
.ossn-wall-items,
.ossn-wall-container-data,
.post-contents,
.post-menu,
.wall-tabs,
.group-wall,
.ossn-wall-post,
.ossn-wall-image-container {
	background-color: var(--dk-surface) !important;
	color: var(--dk-text);
	border-color: var(--dk-border) !important;
}
.ossn-wall-item .meta,
.ossn-wall-post-time,
.ossn-wall-item-type { color: var(--dk-muted) !important; }

/* Post composer + privacy selector */
.ossn-wall-textarea,
.ossn-wall-privacy,
.ossn-wall-privacy-dummy {
	background-color: #161616 !important;
	color: var(--dk-text) !important;
	border-color: var(--dk-border) !important;
}
.wall-tabs .active,
.wall-tabs li:hover { background-color: var(--dk-surface-2) !important; }

/* ---- Comments (OssnComments) ---- */
.comments-list { background-color: transparent !important; }
.comments-item,
.ossn-comment-attachment,
.ossn-comment-menu {
	background-color: var(--dk-surface-2) !important;
	color: var(--dk-text) !important;
	border-color: var(--dk-border) !important;
}
.comments-item a { color: var(--dk-text); }
.comments-item .comments-likes,
.comments-item .meta { color: var(--dk-muted) !important; }
.ossn-comments-container input[type='text'],
.ossn-comments-container textarea {
	background-color: #161616 !important;
	color: var(--dk-text) !important;
	border-color: var(--dk-border) !important;
}

/* ---- Force readable text where the base CSS hardcodes dark colours ---- */
.topbar .ossn-icons-topbar-friends, .topbar .ossn-icons-topbar-messages, .topbar .ossn-icons-topbar-notification i,
.ossn-topbar-dropdown-menu ul li a, .ossn-topbar-dropdown-menu ul li,
.sidebar .sidebar-parent-item-main[aria-expanded="true"] a,
ul.token-input-list,
li.token-input-token,
li.token-input-selected-token,
div.token-input-dropdown ul li.token-input-selected-dropdown-item,
.ossn-message-box .contents label,
.button-grey, .btn-action,
.btn-default,
.btn-default:focus, .btn-default.focus,
.btn-default:hover,
.btn-default:active, .btn-default.active, .open>.dropdown-toggle.btn-default,
.ossn-notifications-box,
.ossn-notifications-box .type-name,
.ossn-notifications-box .notfi-meta,
.ossn-notifications-friends-inner a,
.ossn-chat-base,
.ossn-chat-tab-titles,
.ossn-search input[type='text'],
.ossn-ad-item a,
.btn-standalone-grey,
.btn-standalone-grey:hover,
.upload-photo span,
#group-header-menu>ul>li>a,
.ossn-group-profile .profile-header .group-name a {
	color: var(--dk-text) !important;
}

/* Surfaces that were still light behind that text */
.ossn-notifications-box,
.ossn-chat-base,
.ossn-chat-tab-titles {
	background-color: var(--dk-surface) !important;
	border-color: var(--dk-border) !important;
}
.ossn-search input[type='text'],
ul.token-input-list,
li.token-input-token,
li.token-input-selected-token,
div.token-input-dropdown {
	background-color: #161616 !important;
	border-color: var(--dk-border) !important;
}

/* ---- Remaining light surfaces from the base theme + components ---- */
.ossn-form input[type='number']:focus, .ossn-form input[type='email']:focus, .ossn-form input[type='password']:focus, .ossn-form text:focus, .ossn-form select:focus, .ossn-form textarea:focus, .ossn-form input[type='text']:focus,
.ossn-layout-module,
.ossn-layout-media .content, .ossn-page-contents,
.ossn-page-loading-annimation,
.newsfeed-middle-top,
.sidebar .sidebar-parent-item-main[aria-expanded="true"],
.ossn-widget,
ul.token-input-list,
div.token-input-dropdown,
div.token-input-dropdown ul li,
div.token-input-dropdown ul li.token-input-dropdown-item,
div.token-input-dropdown ul li.token-input-dropdown-item2,
.ossn-viewer .info-block,
.ossn-message-box,
.btn-default,
.ossn-notifications-box,
.ossn-notif-delete-item,
.ossn-chat-base .ossn-chat-bar .inner:hover,
.ossn-chat-base .ossn-chat-bar .friends-list,
.ossn-chat-tab-titles,
.friend-tab-item .tab-container,
.friend-tab-item .tab-container .data,
.ossn-chat-icon-smilies,
.ossn-chat-icon-attachment, .ossn-chat-icon-smile,
.ossn-chat-message-sending,
.ossn-chat-message-attachment-details,
.ossn-wall-item,
.ossn-wall-container .controls li:hover,
.ossn-wall-container-data,
.ossn-wall-container input[type="file"],
#token-input-ossn-wall-friend-input,
#ossn-wall-location-input,
#ossn-wall-form .ui-autocomplete-loading,
.ossn-profile .top-container,
.ossn-profile .profile-photo,
.profile-menu-hr-container,
.user-photo-uploading,
.ossn-profile-edit-layout,
.ossn-comment-attachment .image-data,
.ossn-messages,
.ossn-recent-messages-toggle:hover,
#group-header-menu>ul>li>a:not(.group-header-more),
.ossn-group-profile .profile-header .header-bottom,
.ossn-location-dropdown,
.ossn-like-reactions-panel {
	background-color: var(--dk-surface) !important;
	border-color: var(--dk-border) !important;
}
.ossn-form input[type='number'], .ossn-form input[type='email'], .ossn-form input[type='password'], .ossn-form text, .ossn-form select, .ossn-form textarea, .ossn-form input[type='text'],
.ossn-layout-module .module-title,
.ossn-widget .widget-heading,
.ossn-menu-search li:hover,
li.token-input-token,
li.token-input-selected-token,
div.token-input-dropdown ul li.token-input-selected-dropdown-item,
.ossn-message-box .title,
.ossn-message-box .control,
.button-grey, .btn-action,
.button-grey:hover, .btn-action:hover,
.btn-default:focus, .btn-default.focus,
.btn-default:hover,
.btn-default:active, .btn-default.active, .open>.dropdown-toggle.btn-default,
.dropdown-item.active, .dropdown-item:active,
.page-link:hover,
.ossn-notifications-box .notificaton-item:hover, .ossn-notifications-box .notificaton-item .active,
.ossn-notifications-box .bottom-all,
.ossn-notifications-box li:hover, .ossn-notifications-box a:hover, .ossn-notifications-all a:hover, .ossn-notifications-all li:hover,
.ossn-chat-base .ossn-chat-bar .inner,
.ossn-chat-base .ossn-chat-bar .friends-list-item:hover,
.friend-tab-item .friend-tab,
.friend-tab-item .data .message-reciever .text,
.friend-tab-item .friend-tab input[type='text'],
.ossn-chat-option-title-icon:hover,
.ossn-chat-icon-attachment:hover, .ossn-chat-icon-smile:hover,
.ossn-chat-windows-long,
.ossn-chat-windows-long .friends-list-item:hover,
.ossn-search-active-item,
.ad-image-container,
.ossn-sidebar-admin-cta,
.ossn-wall-container .controls,
.ossn-wall-container .wall-tabs,
.ossn-wall-container .wall-tabs .item:hover,
.ossn-wall-container .controls li,
.ossn-wall-privacy-dummy, .ossn-wall-privacy,
.ossn-wall-privacy-dummy,
.ossn-wall-privacy:hover,
.ossn-wall-image-container,
.profile-hr-menu>li>a:not(.profile-hr-menu .dropdown-toggle):hover, .profile-hr-menu>ul>li:hover>a:not(.profile-hr-menu .dropdown-toggle),
.btn-standalone-grey,
.btn-standalone-grey:active,
.upload-photo,
.profile-edit-layout-title,
.ossn-photos li,
.ossn-photo-viewer,
.ossn-photos-wall,
.comments-list,
.comments-list .comments-item .comment-contents,
.comment-container span[readonly='readonly'], .comment-container input[readonly='readonly'],
.comment-box,
.ossn-site-pages-title,
.ossn-messages .messages-recent .messages-from .message-new,
.ossn-notification-messages .user-item:hover,
.ossn-notification-messages .message-new,
.message-box-recieved,
.ossn-message-attach-photo:hover, .ossn-message-icon-attachment:hover,
.group-header-more,
#group-header-menu>li>a:not(.group-header-menu .dropdown-toggle):hover, #group-header-menu>ul>li:hover>a:not(.group-header-menu .dropdown-toggle),
.ossn-notification-unviewed,
.ossn-location-item:hover, .ossn-location-item:active,
.like-share,
.menu-likes-comments-share > li a:hover {
	background-color: var(--dk-surface-2) !important;
	border-color: var(--dk-border) !important;
}
.button-grey,
.btn-action,
.button-grey:hover,
.btn-action:hover {
	background: var(--dk-surface-2) !important;
	color: var(--dk-text) !important;
	border-color: var(--dk-border) !important;
}
