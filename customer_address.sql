create view customer_address
	as
	select c.id,c.username,a.id,a.address
	from customers c
	inner join addresss a
	on c.addressid = a.id