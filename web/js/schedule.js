$(function () {
    
    var url=location.origin+"/games";
    $.getJSON(url, function (data) {
        var items = [];
        $.each(data, function (key, val) {
            var trEl = $("<tr>")
                    .append("<td>" + val.GameID + "</td>")
                    .append("<td>" + val.DateTime + "</td>")
                    .append("<td>" + val.HomeTeam+ "</td>")
                    .append("<td>" + val.AwayTeam + "</td>")
					.append("<td>" + val.StadiumID + "</td>");

            items.push(trEl);
        });
        $("#gameList tbody").append(items);
    });
});

 