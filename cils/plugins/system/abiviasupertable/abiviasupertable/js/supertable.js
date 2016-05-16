/**
 * Abivia Super Table Plugin.
 *
 * @package AbiviaSuperTable
 * @copyright (C) 2011-2012 by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */

jQuery.noConflict();
jQuery(function() {
	var tablesCol = jQuery('.supertable-colmode');
    // Auto height adjustment
    tablesCol.each(function(tableInd, table) {
        var rowMax = new Array();
        var columns = jQuery(table).find('.supertable-col');
        columns.each(function(colInd, col) {
            var rows = jQuery(col).find('.supertable-cell');
            rows.each(function(rowInd, row) {
                if (rowMax[rowInd] === undefined) {
                    rowMax[rowInd] = jQuery(row).height();
                } else {
                    rowMax[rowInd] = Math.max(rowMax[rowInd], jQuery(row).height());
                }
            });
        });
        columns.each(function(colInd, col) {
            var rows = jQuery(col).find('.supertable-cell');
            rows.each(function(rowInd, row) {
                jQuery(row).height(rowMax[rowInd]);
            });
        });
    });
	var highlightCol = new Array();
	tablesCol.each(function(tableInd, table) {
        if (jQuery(table).hasClass('supertable-inactive')) {
            return;
        }
		var columns = jQuery(table).find('.supertable-col');
		columns.each(function(colInd, col) {
			if (jQuery(col).hasClass('supertable-active')) {
				highlightCol[tableInd] = colInd;
			}
            if (!jQuery(col).hasClass('supertable-col-rowhead')) {
                jQuery(col).bind({
                    'mouseenter': function() {
                        jQuery(columns).removeClass('supertable-active');
                        jQuery(this).addClass('supertable-active');
                    }
                });
            }
		});
		var headcolumns = jQuery(table).find('.supertable-col-rowhead');
		headcolumns.each(function(colInd, col) {
			jQuery(col).bind({
				'mouseleaave': function() {
					jQuery(columns).removeClass('supertable-active');
					jQuery(table).getElements('.supertable-col')[highlightCol[tableInd]]
                        .addClass('supertable-active');
				}
			});
		});
		if (highlightCol[tableInd] !== undefined) {
			jQuery(table).bind('mouseleave', function() {
				jQuery(table).find('.supertable-col').removeClass('supertable-active');
				jQuery(jQuery(table).find('.supertable-col')[highlightCol[tableInd]])
                    .addClass('supertable-active');
			});
		}
	});
});
