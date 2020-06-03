Ovveride base menu
livevideo:
  menu: App\Menu\LiveVideoMenu
  
or register new instance in file service.yml
App\Menu\LiveVideoMenu:
  tags:
    - { name: evrinoma.menu }
 