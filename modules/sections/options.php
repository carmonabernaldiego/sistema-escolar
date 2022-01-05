<?php
include_once 'security.php';
?>
<div class="form-options">
    <div class="options">
        <form action="" method="POST">
            <button id="btnAddOptions" class="btn btn-add icon" name="btn" value="form_add" type="submit">add</button>
        </form>
        <form action="" method="POST">
            <button class="btn btn-disabled icon" name="btn" value="form_coding" type="submit" disabled>code</button>
        </form>
        <form action="" method="POST">
            <button class="btn btn-disabled icon" name="btn" value="form_printer" type="submit" disabled>print</button>
        </form>
        <button id="btnSearchMobile" class="btn btn-search-mobile icon">search</button>
        <form action="/">
            <button id="btnExitOptions" class="btn btn-exit icon" type="submit">exit_to_app</button>
        </form>
    </div>
    <div class="search">
        <form name="form-search" action="" method="POST">
            <p>
                <input type="text" class="text-search" id="txtSearch" name="search" placeholder="Buscar..." autofocus>
                <button id="btnSearch" class="btn-search icon" type="submit">search</button>
            </p>
        </form>
    </div>
</div>
<script src="/js/controls/options.js"></script>