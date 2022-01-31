<?php
if ($this->user->userMetadataModel->exists($this->user->getid(), "boardcustomizer_materialcard")) {
    /* change overall card layout and shadow */
    ?>
    <style>
        .board-task-list>div.task-board {
            font-size: 13px;
            border-left-width: 2.5px !important;
            border-radius: 3px;
            padding-left: 6px;
            padding-right: 4px;
            padding-top: 6px;
            padding-bottom: 6px;
            margin-bottom: 8px;
            margin-left: 8px;
            margin-right: 8px;
            box-shadow: 0 1px 2px rgba(62, 54, 54, 0.55);
            border-right: none;
            border-top: 1px solid #ececec;
            border-bottom: none;
        }
    </style>
<?php
}
if ($this->user->userMetadataModel->exists($this->user->getid(), "boardcustomizer_compactlayout")) {
    /* compact layout */
    ?>
    <style>
        .btnbox {position:relative;min-height:25px;display:flex;flex-flow:row nowrap;align-items:center}
        .btn {min-height:inherit;display:flex !important;align-items: center;padding: 3px 3px 3px 5px !important}
        .task-board-avatars-inner {float:right;display:flex;justify-content:center}
        .task-board-avatars-outer {float:right}
        .task-board-icons-top {float:left;position:relative;margin-right:3px}
        .task-board-icons-abs-topright {position:absolute;top:0px;right:0px;white-space:nowrap}
        .title-container {display:flex;align-items:center}

        .sidebar {min-width:170px !important}
        .sidebar-content {max-width:90% !important}
        .code {background:#272822 !important;padding: 3px 6px 3px 6px;color:#fff !important}
        .task-board {padding-right:0px !important;padding-bottom:1px !important;padding-left:3px !important;padding-top:3px !important;font-weight:600}
        .task-board-icons {margin-top: 0px !important;}
        .task-board-title {margin-bottom:1px}
        .table-list {margin-left: 9px;margin-bottom: 9px !important}
        .margin-top {margin-top:9px !important}
        .margin-bottom {margin-bottom:9px !important}
        .views-switcher-component {padding: 2px 0px 4px 1px}
        .bbprojectcollapse {padding: 5px 9px 1px 9px !important}
        .board-column-title {padding: 0px 9px 0px 3px}
        .board-column-header {padding: 3px 5px 0px 5px !important}
        small {padding:0px 6px 0px 6px !important}
        header {padding:5px 5px !important;margin-bottom: 9px !important}
        #to-top {margin: 0px 0px 9px 0px !important}
        .assigned-group-label {display:none}
        .assigned-other-label {display:none}
    </style>
<?php
}
if ($this->user->userMetadataModel->exists($this->user->getid(), "boardcustomizer_onlyfirstcolumnheaders")) {
    /* This will hide all column titles on swimlanes except for the first one */
    ?>
    <style>
        tr[class*='board-swimlane-columns']:not(:first-child) {
            display: none;
        }

        .board-column-header-task-count {
            display: none;
        }
    </style>
<?php
}
if ($this->user->userMetadataModel->exists($this->user->getid(), "boardcustomizer_hidetaskage")) {
    /* hide task age */
    ?>
    <style>
        .task-icon-age {
            display: none;
        }
    </style>
<?php
}
if ($this->user->userMetadataModel->exists($this->user->getid(), "boardcustomizer_hidetaskpriority")) {
    /* hide task priority */
    ?>
    <style>
        .task-priority {
            display: none;
        }
    </style>
<?php
}
if ($this->user->userMetadataModel->exists($this->user->getid(), "boardcustomizer_whitebackground")) {
    /* task white background */
    ?>
    <style>
        .board-task-list>div {
            background-color: white !important;
            background: #fff;
        }
    </style>
<?php
}
if ($this->user->userMetadataModel->exists($this->user->getid(), "boardcustomizer_topnavhiddenscrollbar")) {
    /* better nav bar */
    ?>
    <style>
        #select-dropdown-menu {
            overflow: auto !important;
        }
    </style>
<?php
}
if ($this->user->userMetadataModel->exists($this->user->getid(), "boardcustomizer_groupassign_hidecardlabels")) {
    /* hide group assign labels */
    ?>
    <style>
        .assigned-group-label {
            display: none;
        }

        .assigned-other-label {
            display: none;
        }
    </style>
<?php
}
if ($this->user->userMetadataModel->exists($this->user->getid(), "boardcustomizer_hideownername")) {
    /* hide owner text */
    ?>
    <style>
        div.task-board-header > .task-board-assignee {
            display: none;
        }
    </style>
<?php
}
if ($this->user->userMetadataModel->exists($this->user->getid(), "boardcustomizer_hidecategory")) {
    /* hide category */
    ?>
    <style>
        .task-board-category-container {
            display: none;
        }
    </style>
<?php
}
if ($this->user->userMetadataModel->exists($this->user->getid(), "boardcustomizer_hidetags")) {
    /* hide tags */
    ?>
    <style>
        .task-tags {
            display: none;
        }
    </style>
<?php
}
if ($this->user->userMetadataModel->exists($this->user->getid(), "boardcustomizer_hidefooter")) {
    /* hide whole footer */
    ?>
    <style>
        .task-board-icons {
            display: none;
        }
    </style>
<?php
}
if ($this->user->userMetadataModel->exists($this->user->getid(), "boardcustomizer_hidereference")) {
    /* hide reference */
    ?>
    <style>
        .task-board-reference {
            display: none;
        }
    </style>
<?php
}
if ($this->user->userMetadataModel->exists($this->user->getid(), "boardcustomizer_hidescore")) {
    /* hide score */
    ?>
    <style>
        .task-score {
            display: none;
        }
    </style>
<?php
}
if ($this->user->userMetadataModel->exists($this->user->getid(), "boardcustomizer_hidetimeestimated")) {
    /* hide time estimated */
    ?>
    <style>
        .task-time-estimated {
            display: none;
        }
    </style>
<?php
}
if ($this->user->userMetadataModel->exists($this->user->getid(), "boardcustomizer_hidetaskdate")) {
    /* hide task date */
    ?>
    <style>
        .task-date {
            display: none;
        }
    </style>
<?php
}
