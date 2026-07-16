/******************************************************************
 * OSSN Dark theme — colour override
 * Loaded after the base stylesheet so these rules win.
 * Only colours/surfaces are changed here; layout is inherited.
 ******************************************************************/
:root {
	--dk-bg:        #0f1216; /* page background            */
	--dk-surface:   #1a1e24; /* cards, topbar, sidebar     */
	--dk-surface-2: #232a32; /* sub-surfaces, hovers       */
	--dk-border:    #2b323b; /* borders / dividers         */
	--dk-text:      #e6e8eb; /* primary text               */
	--dk-muted:     #9aa4af; /* secondary/muted text       */
	--dk-accent:    #3fb1d9; /* links / accents (kept blue)*/
	--dk-accent-2:  #0b769c; /* darker accent              */
}

/* ---- Base ---- */
body {
	background-color: var(--dk-bg) !important;
	color: var(--dk-text);
}
a { color: var(--dk-accent); }
a:hover { color: #66c6e6; }

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
	background-color: #12161b !important;
	color: var(--dk-text) !important;
	border: 1px solid var(--dk-border) !important;
}
.ossn-form textarea:focus,
.ossn-form input:focus,
.form-control:focus {
	background-color: #12161b !important;
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
