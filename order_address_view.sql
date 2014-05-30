create view order_address_view
	as
	select o.id as oid,o.addressid,o.status,o.userid,a.id as aid,a.username,a.address
	from orders o
	inner join addresss a
	on o.addressid = a.id