<?php
$index = $_GET["index"];
?>
<div class="form-group form-row form-item mx-0">
    <div class="col-12 px-0">
        <div class="row mx-0" style="width: 100%;">
            <div class="col-11 pl-0 pr-2">
                <div class="row">
                    <div class="col">
                        <input type="text" style="border-radius: 5px; font-size: 12px;" class="form-control item-label" placeholder="Label" required>
                    </div>
                    <div class="col">
                        <input type="text" style="border-radius: 5px; font-size: 12px;" class="form-control item-key" placeholder="Key" required>
                    </div>
                    <div class="col">
                        <input type="text" style="border-radius: 5px; font-size: 12px;" class="form-control item-value" placeholder="Default Value">
                    </div>
                    <div class="col">
                        <select style="border-radius: 5px; font-size: 12px;" class="form-control item-select">
                            <option selected value="6">Text</option>
                            <option value="11">Multiline Text</option>
                            <option value="5">Number</option>
                            <option value="2">Date & Time</option>
                            <option value="1">Date</option>
                            <option value="3">Time</option>
                            <option value="12">Checkbox</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-1 pl-1 pr-0 d-flex align-items-center">
                <button type="button" class="btn btn-danger delete-button" style="width: 100%; font-size: 12px;">DELETE</button>
            </div>
        </div>
    </div>

    <div class="subitem-area"></div>
</div>