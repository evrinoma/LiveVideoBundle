Ovveride base menu<br>
livevideo:<br>
  menu: App\Menu\LiveVideoMenu
  
or register new instance in file service.yml<br>
App\Menu\LiveVideoMenu:<br>
  tags:
    - { name: evrinoma.menu }
 