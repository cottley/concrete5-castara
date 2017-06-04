/*
 * This javascript file will be automatically loaded when the block runs.
 */
if (typeof String.prototype.startsWith != 'function') {
  String.prototype.startsWith = function (str){
    return this.indexOf(str) == 0;
  };
}

if (typeof String.prototype.endsWith !== 'function') {
    String.prototype.endsWith = function(suffix) {
        return this.indexOf(suffix, this.length - suffix.length) !== -1;
    };
}

if (typeof String.prototype.contains !== 'function') {
    String.prototype.contains = function(needle) {
        return this.indexOf( needle ) !== -1;
    };
}

var castaraTabsGroupTabsFunctions = new Array();
var castaraTabsGroupTabsActivateFunctions = new Array();
var castaraTabsSubTabsFunctions = new Array();
var castaraTabsSubTabsActivateFunctions = new Array();
	
$(function() {
  try { 
    $( "#tabs-right-vertical" ).tabs({

      heightStyle: 'fill',

	  activate: function (evt, ui) {

        $.each( castaraTabsGroupTabsActivateFunctions, function( key, value ) {
          if ($.isFunction(value)) {
			castaraTabsGroupTabsActivateFunctions[key](evt, ui);
		  }
        });

	    Cookies.set('castara-group-tab', ui.newTab.index(), { path: '/' });

		if ($.isFunction(castaraTabsGroupTabsFunctions[ui.newPanel.attr('id')])) {
			
		  castaraTabsGroupTabsFunctions[ui.newPanel.attr('id')]();
		  
		}
		
		var activegrouptabid = ui.newPanel.attr('id');
	    var activesubtab = $( ".subtabs" ).tabs( "option", "active" );
	    var activesubtabid = "";
	
	    $.each($( "#tabs-right-vertical div[id='" + activegrouptabid + "'] .subtabs > div" ), function( index, value) {
		    if (index == activesubtab) {
		      activesubtabid = this.id;
		    }
	    });
	
	    if ($.isFunction(castaraTabsSubTabsFunctions[activesubtabid])) {
			
	      castaraTabsSubTabsFunctions[activesubtabid]();
		  
	    }		
	  },
	  
	  active: Cookies.get('castara-group-tab')  
	  
	});

    $( ".subtabs" ).tabs({

      heightStyle: 'fill',

	  activate: function (evt, ui) {

        $.each( castaraTabsSubTabsActivateFunctions, function( key, value ) {
          if ($.isFunction(value)) {
			castaraTabsSubTabsActivateFunctions[key](evt, ui);
		  }
        });

	    Cookies.set('castara-subgroup-tab', ui.newTab.index(), { path: '/' });
		
		if ($.isFunction(castaraTabsSubTabsFunctions[ui.newPanel.attr('id')])) {
			
		  castaraTabsSubTabsFunctions[ui.newPanel.attr('id')]();
		  
		}
	  },
	  
	  active: Cookies.get('castara-subgroup-tab')  
	  
	});
	
	var activegrouptab = $( "#tabs-right-vertical" ).tabs( "option", "active" );
	
	var activegrouptabid = "";
    $.each($( "#tabs-right-vertical > div" ), function( index, value) {
		if (index == activegrouptab) {
		  activegrouptabid = this.id;
		}
	});	
	
	if ($.isFunction(castaraTabsGroupTabsFunctions[activegrouptabid])) {
			
	  castaraTabsGroupTabsFunctions[activegrouptabid]();
		  
	}
	
	var activesubtab = $( ".subtabs" ).tabs( "option", "active" );
	var activesubtabid = "";
	
	$.each($( "#tabs-right-vertical div[id='" + activegrouptabid + "'] .subtabs > div" ), function( index, value) {
		if (index == activesubtab) {
		  activesubtabid = this.id;
		}
	});
	
	if ($.isFunction(castaraTabsSubTabsFunctions[activesubtabid])) {
			
	  castaraTabsSubTabsFunctions[activesubtabid]();
		  
	}
	
  } catch (ex) { console.log(ex);  }
});