function setOrgsPage(){
  $.post("php/loadOrgsPage.php", function(response){
    var data = JSON.parse(response);
console.log(response);
    for(key in data){
      var org = data[key];

      $("#contain_orgs").append('<div class="jumbotron bg-light smaller-padding" data-orgid=' + org["code"] + '>\
                                    <div class="row justify-content-between align-items-center">\
                                        <div class="col-6">\
                                            <h2 class="display-4">' + org["name"] + '</h2>\
                                            <p class="lead">' + org["description"] + '</p>\
                                        </div>\
                                        <div class="col-4 projects">\
                                        <div>\
                                    </div>\
                                </div>');

      for(keyP in org["projects"]){
        var project = org["projects"][keyP];

        $("[data-orgid=" + org['code'] + "]").find(".projects").append('<div class="row padding-top">\
                                                                          <div class="col-4">\
                                                                              <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_162c5d95e24%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_162c5d95e24%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22101.875%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap" style="height:100%">\
                                                                          </div>\
                                                                          <div class="col-8 px-1">\
                                                                              <div class="card-block px-1">\
                                                                                  <h5 class="card-title">' + project["name"] + '</h5>\
                                                                                  <p class="card-text">' + project["description"] + '</p>\
                                                                                  <a href="#" class="btn btn-primary">Give now</a>\
                                                                              </div>\
                                                                          </div>\
                                                                      </div>');
      }
    }
  });
}

//Call the function
$(document).ready(function(){
  setOrgsPage();
});
