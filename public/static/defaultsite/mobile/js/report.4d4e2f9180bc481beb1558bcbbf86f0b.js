$("[data-toggle-open]").on("click",(function(t){var a=$(this).attr("data-toggle-open");$(this).toggleClass("collapsed"),$(this).hasClass("collapsed")?($("body").addClass("overflow-hidden"),$('[data-toggle="'+a+'"]').addClass("open")):($("body").removeClass("overflow-hidden"),$('[data-toggle="'+a+'"]').removeClass("open")),t.preventDefault()})),$("[data-toggle-close]").on("click",(function(t){var a=$(this).attr("data-toggle-close");$('[data-toggle-open="'+a+'"]').trigger("click"),t.preventDefault()})),$("#form-report").submit((function(t){t.preventDefault(),$(".modal-form .btn--submit").attr("disabled",!0).addClass("btn-disable"),$(".label-error").html(""),$th=this,data=$($th).serialize(),$.getJSON(window.location.origin+"/get-token",(function(t){$.ajax({url:window.location.origin+"/report",method:"POST",data:data+"&visitor_id="+window.ahoy.visitorId+"&_token="+t.token,success:function(t){return"success"!=t.status?callback(t):($($th).closest(".modal-form").addClass("hidden"),$(".modal-alert").removeClass("hidden"),$(".modal-form .btn--submit").attr("disabled",!1).removeClass("btn-disable"),callback(null))},error:function(t){$.each(t.responseJSON.errors,(function(t,a){$("#"+t+"-error").html(a[0])})),$(".modal-form .btn--submit").attr("disabled",!1).removeClass("btn-disable")}})}))}));
