/******************************************************************
 * OSSN Dark theme — admin panel colour override
 * Loaded after administrator.php so these rules win.
 ******************************************************************/
:root {
	--dk-bg:        #171717;
	--dk-surface:   #1e1e1e;
	--dk-surface-2: #26292b;
	--dk-border:    #33383b;
	--dk-text:      #abb8c3;
	--dk-muted:     #7c8894;
	--dk-accent-2:  #00728f;
}

body { background-color: var(--dk-bg) !important; color: var(--dk-text); }

/* Admin top bar + submenus */
.navbar-default,
.topbar-menu,
.admin-topbar-menu-li-home,
.admin-topbar-menu-li-help,
.admin-topbar-menu-li-viewsite,
.admin-topbar-menu-li-support,
.admin-topbar-menu-li-configure,
.admin-topbar-smenu-usermanager,
.admin-topbar-smenu-themes,
.admin-topbar-smenu-settings,
.admin-topbar-smenu-components {
	background-color: var(--dk-surface) !important;
	color: var(--dk-text) !important;
	border-color: var(--dk-border) !important;
}
.navbar-default a, .topbar-menu a { color: var(--dk-text) !important; }

/* Dashboard + content surfaces */
.ossn-admin-dashboard,
.ossn-admin-pg-content,
.ossn-admin-all-users,
.admin-dashboard-contents-small,
.admin-dashboard-box-small,
.ossn-admin-search-pro-line,
.ossn-admin-users-search-actions-header,
.card,
.card-body,
.card-spacing {
	background-color: var(--dk-surface) !important;
	color: var(--dk-text) !important;
	border-color: var(--dk-border) !important;
}
.card-header, .card-footer {
	background-color: var(--dk-surface-2) !important;
	border-color: var(--dk-border) !important;
	color: var(--dk-text) !important;
}

/* Dropdowns */
.dropdown-submenu, .dropdown-menu {
	background-color: var(--dk-surface-2) !important;
	color: var(--dk-text) !important;
	border-color: var(--dk-border) !important;
}
.dropdown-menu a:hover { background-color: #2c343d !important; }

/* Tables */
.table-titles, .table td, .table th, table td, table th {
	border-color: var(--dk-border) !important;
	color: var(--dk-text);
}
.table-striped tbody tr:nth-of-type(odd) { background-color: var(--dk-surface-2); }

/* Pagination */
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

/* Form controls */
input.form-control, textarea.form-control, select.form-control,
.ossn-form input, .ossn-form textarea, .ossn-form select {
	background-color: #161616 !important;
	color: var(--dk-text) !important;
	border: 1px solid var(--dk-border) !important;
}
::placeholder { color: var(--dk-muted) !important; }

h1,h2,h3,h4,h5,h6 { color: var(--dk-text); }
hr { border-color: var(--dk-border); }

/* ---- Force readable text where the base CSS hardcodes dark colours ---- */
input[type='number'], input[type='email'], select, input[type="password"], input[type="text"], textarea,
label,
.ossn-message-box .contents label,
.card-header,
.ossn-admin-search-pro-line input[type="text"],
.ossn-pagination .page-link:hover,
.ossn-com-row .com-ui-name,
.ossn-admin-ad-cron .title-text h4 {
	color: var(--dk-text) !important;
}
