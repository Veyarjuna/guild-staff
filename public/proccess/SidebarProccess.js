var data = $('#api_link').val()
let path = window.location.pathname;
   $.ajax({
       url: data+"/menus",
       success:function(response){
            var menu = ``;
            var submenu = ``;
            var singlemenu = ``;
            var data = response.data;

            data.sort((a, b) => a.menu - b.menu)

            data.forEach(item => {
                if(item.menu_parent == "0" && item.menu_has_sub == "1"){
                    menu = `<li class="sidebar-item  has-sub">
                                <a href="${item.menu_endpoint}" class='sidebar-link'>
                                    ${item.menu_icon}
                                    <span>${item.name_menu}</span>
                                </a>
                                <ul class="submenu" id="submenu${item.menu}">
                                    
                                </ul>
                            </li>`

                    $('.menu').append(menu)        
                }

                
                if(item.menu_parent != "0"){
                    var super_menu_id = item.menu.split('.')[0]
                    submenu = `<li class="submenu-item">
                                    <a href="${item.menu_endpoint}">${item.menu_icon} ${item.name_menu}</a>
                                </li>`;
                    $(`#submenu${super_menu_id}`).append(submenu)

                    if(item.menu_endpoint == path){
                        $(`#submenu${super_menu_id}`).addClass('active')
                    }
                }

                if(item.menu_parent == "0" && item.menu_has_sub == "0"){
                        singlemenu = `<li class="sidebar-item">
                                            <a href="${item.menu_endpoint}" class='sidebar-link'>
                                                ${item.menu_icon}
                                                <span>${item.name_menu}</span>
                                            </a>
                                        </li>`
                    $('.menu').append(singlemenu)   
                }
            });
            $('li a[href="' + path + '"]').parent('li').addClass('active');
        }
   })