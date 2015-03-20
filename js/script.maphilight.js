var wall = "Глянцевый";
var ColorText;

jQuery(function() {
	
	function replaceAll(str, what, to) { 
	   return str.split(what).join(to); 
	} 
	
	jQuery('#ceiling').maphilight({ fillColor: 'ffffff' });
	var data = [];
	data.alwaysOn = !data.alwaysOn;
	jQuery('#area').data('maphilight', data).trigger('alwaysOn.maphilight');
	
	
	jQuery("#input_color p#wall_item span").click(function(){
		jQuery("#input_color p#wall_item span").removeClass("act");
		var id = jQuery(this).addClass("act").attr("id");
		wall = jQuery(this).text();
		jQuery("#input_color .input_color_wall div.pollo").hide();
		id = id.replace("_point","");
		jQuery("#input_color .input_color_wall div#"+id).show();
		if(id == "lacquered") {
			jQuery("img#potolok").show();
		} else {
			jQuery("img#potolok").hide();
		}
	});
	
	jQuery("#input_color .input_color_wall span").click(function(){
		var color = jQuery(this).attr("class");
		color = color.replace("_","");
		var text = jQuery(this).attr("id");
		ColorText = replaceAll(text,"_"," ");
		jQuery("#room_color #wall").css("background","#"+color);
		jQuery("p#your_choice span#color_bottom").css("background","#"+color).addClass("color_bottom_shadow");
		jQuery("p#your_choice span#color_bottom_text_our").addClass("color_bottom_text_our_show");
		jQuery(".measurement_dop").show();
		jQuery("p#your_choice span#color_bottom_text").text(wall+" ("+ColorText+")");
		jQuery("#input_color .input_color_wall span").html("");
		jQuery(this).html("<div></div>");
	});
	
	jQuery("#input_color .input_color_floor span").click(function(){
		var color = jQuery(this).attr("class");
		color = color.replace("_","");
		jQuery("#room_color #floor").css("background","#"+color);
		jQuery("#input_color .input_color_floor span").html("");
		jQuery(this).html("<div></div>");
	});
	
	jQuery("#input_color .input_color_ceiling span").click(function(){
		var color = jQuery(this).attr("class");
		color = color.replace("_","");
		jQuery('#ceiling').maphilight({ fillColor: color });
		jQuery('#area').data('maphilight', data).trigger('alwaysOn.maphilight');
		jQuery("#input_color .input_color_ceiling span").html("");
		jQuery(this).html("<div></div>");
	});
	
	jQuery("#input_color p#floor_item span").click(function(){
		jQuery("#input_color p#floor_item span").removeClass("act");
		var id = jQuery(this).addClass("act").attr("id");
		if(id == "laminate_point") {
			jQuery("img#laminat").show();
			jQuery("img#carpeting").hide();
			jQuery("#input_color .input_color_floor #laminate").show();
			jQuery("#input_color .input_color_floor #carpeting").hide();
		} else {
			jQuery("img#laminat").hide();
			jQuery("img#carpeting").show();
			jQuery("#input_color .input_color_floor #laminate").hide();
			jQuery("#input_color .input_color_floor #carpeting").show();
		}
	});
	
	jQuery(".measurement_dop").hover(

        function(){
            jQuery(this).addClass("measurement_dop_hov");
        },
        function(){
            jQuery(this).removeClass("measurement_dop_hov");
        }

    );
	
	jQuery(".measurement_dop").click(function(){
        jQuery('.additional-info').remove();
		jQuery("form#order textarea").val("Мне понравился "+wall+" потолок цвета «"+ColorText+"»");
        jQuery("div#form-order").dialog({

            position: ["center","center"],
            bgiframe: true,
            modal: true,
            height: 500,
            width: 725,
            closeText: ""

        });

        return false;

    });
	
});
