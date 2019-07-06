<?php
if ($this->user->userMetadataModel->exists(1, "boardcustomizer_materialcard")) {
    /* change overall card layout and shadow */
    ?>
    <style>
        .board-task-list>div {
            font-size: 13px;
            border-left-width: 2.5px !important;
            /* background-color: white!important;
                    background: #fff; */
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
if ($this->user->userMetadataModel->exists(1, "boardcustomizer_onlyfirstcolumnheaders")) {
    /* This will hide all column titles on swimlanes except for the first one */
    ?>
    <style>
        tr[class*='board-swimlane-columns']:not(:first-child) {
            display: none;
        }
    </style>
<?php
}
