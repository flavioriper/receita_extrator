<style>
    .container-fix {
        border: 1px solid #e5e5e5;
    }

    .small {
        font-size: 12px;
        color: rgba(0, 0, 0, 0.308);
    }

    .cnae-escolhido {
        padding: 0 5px;
        color: rgba(0, 0, 0, 0.349);
        cursor: pointer;
    }

    /* Estilos do autocomplete UI */
    .au-breadcrumb2 {
        padding-top: 10px;
        padding-bottom: 50px;
    }

    .ui-autocomplete span.hl_results {
        background-color: #ffff66;
    }
    
    .ui-autocomplete-loading {
        background: white url('assets/images/ui-anim_basic_16x16.gif') right center no-repeat;
    }
    
    .ui-autocomplete {
        max-height: 250px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
        /* add padding for vertical scrollbar */
        padding-right: 5px;
    }
    
    .ui-autocomplete li {
        font-size: 16px;
    }
    
    * html .ui-autocomplete {
        height: 250px;
    }
</style>