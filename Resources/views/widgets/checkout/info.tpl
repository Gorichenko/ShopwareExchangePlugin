{extends file="parent:widgets/checkout/info.tpl"}

{block name="frontend_index_checkout_actions_notepad"}

    <style>
        .rates {
            width:100%;
            text-align:center;
        }
    </style>

    <a class="btn is--primary update_rate_btn">Update Current Rate</a>
    <div class="rates">
        {$current_rate}
    </div>
    {$smarty.block.parent}
{/block}
