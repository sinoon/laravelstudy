create view fullcart as
 select c.userid,c.foodid,c.num,f.name,f.price,f.stock,f.status as foodstatus,r.restaurantname,r.typeofdemand,r.demandfornum,r.demandformoney,r.moring,r.night,r.addressid,r.mobile,r.phone,r.status as reststatus,a.address
 from carts c
 inner join foods f 
 on c.foodid = f.id
 inner join restaurants  r
 on f.belongto = r.username
 inner join addresss  a
 on a.username = r.username


 create view shortcart as
 select c.userid,c.foodid,c.num,f.name
 from carts  c
 inner join foods  f 
 on c.foodid = f.id
