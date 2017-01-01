
/* This is everything that is pulled into the projects page */

jQuery(function($) {
$('#thumbs img').click(function(){
	$('#largeImage').attr('src',$(this).attr('src').replace('thumb','large'));
}); });



jQuery(function($) {
/*
$('#spaces-menu-head-project').click(function() {
  $('#spaces-menu-project').slideToggle('slow', function() {
    // Animation complete.
  });
});
*/

$('#spaces-menu-head-project').click(function() {
  $('#spaces-menu-project').toggle();
  $('#styles-menu-project').hide();
});

$('#styles-menu-head-project').click(function() {
  $('#styles-menu-project').toggle();
  $('#spaces-menu-project').hide();
});


$(document).mouseup(function (e)
{
    var container = $("#styles-menu-project");
    if (container.has(e.target).length === 0)
    {
        container.hide();
    }
});
$(document).mouseup(function (e)
{
    var container = $("#spaces-menu-project");
    if (container.has(e.target).length === 0)
    {
        container.hide();
    }
});

/*

$('body').click(function() {
	    $('styles-menu-project').toggle();
});

if( $('#styles-menu-proect').is(":visible") ) {
    $('.pod-projects').click(function() {
	    $('styles-menu-project').hide();
    });
}


$('#styles-menu-head-project').click(function() {
  $('#styles-menu-project').slideToggle('slow', function() {
    // Animation complete.
  });
});

$('#mobile-filter').click(function() {
  $('#mobile-filter-menu').slideToggle('slow', function() {
    // Animation complete.
  });
});

*/

// Styles filter

$('#transitional').click(function() {
  $('#mycarousel li').hide();
  $('#transitional').css('color','#666');
  $('#traditional, #contemporary').css('color','#999');
  $('li.transitional').slideToggle('fast', function() {
    // Animation complete.
  });


});

$('#traditional').click(function() {
  $('#mycarousel li').hide();
  $('#traditional').css('color','#666');
  $('#transitional, #contemporary').css('color','#999');
  $('li.traditional').slideToggle('fast', function() {
    // Animation complete.
  });
});

$('#contemporary').click(function() {
  $('#mycarousel li').hide();
  $('#contemporary').css('color','#666');
  $('#transitional, #traditional').css('color','#999');
  $('li.contemporary').slideToggle('fast', function() {
    // Animation complete.
  });
});

// Spaces filter

$('#kitchen').click(function() {
  $('#mycarousel li').hide();
  $('#kitchen').css('color','#666');
  $('#bath, #living, #specialty, #exterior').css('color','#999');
  $('li.kitchen').slideToggle('fast', function() {
    // Animation complete.
  });
});

$('#bath').click(function() {
  $('#mycarousel li').hide();
  $('#bath').css('color','#666');
  $('#kitchen, #living, #specialty, #exterior').css('color','#999');
  $('li.bath').slideToggle('fast', function() {
    // Animation complete.
  });
});

$('#living').click(function() {
  $('#mycarousel li').hide();
  $('#living').css('color','#666');
  $('#bath, #kitchen, #specialty, #exterior').css('color','#999');
  $('li.living').slideToggle('fast', function() {
    // Animation complete.
  });
});

$('#specialty').click(function() {
  $('#mycarousel li').hide();
  $('#specialty').css('color','#666');
  $('#bath, #living, #kitchen, #exterior').css('color','#999');
  $('li.specialty').slideToggle('fast', function() {
    // Animation complete.
  });
});

$('#exterior').click(function() {
  $('#mycarousel li').hide();
  $('#exterior').css('color','#666');
  $('#bath, #living, #specialty, #kitchen').css('color','#999');
  $('li.exterior').slideToggle('fast', function() {
    // Animation complete.
  });
});

// All Projects

$('#awards').click(function() {
  $('#mycarousel li').hide();
    $('li.awards').slideToggle('fast', function() {
    // Animation complete.
  });
});

$('#all-projects').click(function() {
  $('#mycarousel li').show();
});



});


/***** END PROJECTS PAGE ********
*********************************/


/***** BEGIN NORMAL HEADER *******/







/***** END NORMAL HEADER *********
*********************************/


/***** BEGIN LARGE HEADER *******/



jQuery(function($) {
$('#spaces-menu-head').click(function() {
  $('#spaces-menu').slideToggle('slow', function() {
    // Animation complete.
  });
});

$('#styles-menu-head').click(function() {
  $('#styles-menu').slideToggle('slow', function() {
    // Animation complete.
  });
});

// About submenu
$('#menu-main-navigation #menu-item-64').click(function() {
  $('#menu-item-64 .sub-menu').slideToggle(1);
});

// Gallery sub menu
$('#menu-main-navigation #menu-item-182').click(function() {
  $('#menu-item-182 .menu-container-gallery').slideToggle(1);
  $('#menu-item-182 .sub-menu').slideToggle(1);
});

/* This is a hack to get the two-column navigation working
Can probably get working. Need to wrap the whole class in a div container
and assign 50% widths to both elements in CSS */

$("#menu-main-navigation .menu-item-182 ul.sub-menu").addClass("column1");
var postsArr = new Array(),
$postsList = $('#menu-main-navigation li.menu-item-182 ul.sub-menu');
//Create array of all posts in lists
$postsList.find('li').each(function(){
postsArr.push($(this).html());
})
//Split the array at this point. The original array is altered.
var firstList = postsArr.splice(0, Math.round(postsArr.length / 2)),
secondList = postsArr,
ListHTML = '';
function createHTML(list){
ListHTML = '';
for (var i = 0; i < list.length; i++) {
ListHTML += '<li>' + list[i] + '</li>'
};
}
//Generate HTML for first list
createHTML(firstList);
$postsList.html(ListHTML);
//Generate HTML for second list
createHTML(secondList);
//Create new list after original one
$postsList.after('<ul class="sub-menu column2"></ul>').next().html(ListHTML);
$("#menu-main-navigation li.menu-item-182 ul.sub-menu").wrapAll("<div class='menu-container-gallery'>");



});




/***** END LARGE HEADER *********
*********************************/


/***** FooBox Modifications ******/
jQuery(function($) {
	var entryTitle = $('h1.entry-title').html();
	$(".fb-next").append(entryTitle);
});
/***** End FooBox Modifications ******/


/**** Contact Us Pulldown Widget ***/

jQuery(function($) {
	$(document).ready(function() {
		var contactHeight = $('.contact-widget').height();
		$('.pulldown-widget').css("top", -contactHeight - 26);

		$('.pulldown-trigger p').click(function() {
			$(this).parents('.pulldown-widget').toggleClass("open");
		});
	});
});
