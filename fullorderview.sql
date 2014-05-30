create view fullorderview
	as
	select fu.orderid,fu.foodid,fu.num,fo.name,fo.price,fo.stock,fo.note,fo.status as foodstatus,fo.savename,fo.type,r.username,
	r.restaurantname,r.describe,r.moring,r.night,r.typeofdemand,r.demandfornum,r.demandformoney,r.mobile,r.status as reststatus,a.address
	from fullorder fu
	inner join foods fo 
	on fu.foodid = fo.id
	inner join restaurants r
	on fo.belongto = r.username
	inner join addresss a
	on r.addressid = a.id