create view cratview
	select c.userid,c.foodid,c.num,f.name,f.price,f.stock,f.status as foodstatus,r.restaurantname,r.typeofdemand,r.demandfornum,r.demandformoney,r.describe,r.moring,r.night,r.addressid,r.mobile,r.phone,r.status as reststatus,a.address
	from carts as c
	inner join foods as f 
	on c.foodid = f.id
	inner join restaurants as r
	on f.belongto = r.username
	inner join addresss as a
	on a.id = r.addressid
