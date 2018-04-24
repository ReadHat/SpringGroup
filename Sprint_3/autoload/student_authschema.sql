CREATE TABLE user (
userid int not null primary key auto_increment,
username varchar(255),
userpass varchar(255),
email varchar(255),
creationdate datetime,
realname varchar(255),
userstatus varchar(255)
);

CREATE TABLE role (
roleid int not null primary key auto_increment,
rolename varchar(255)
);

CREATE TABLE user2role (
id int not null primary key auto_increment,
userid int,
roleid int
);

select username from user, user2role, role
where user.userid = user2role.userid
  and user2role.roleid = role.roleid
  and role.rolename = 'admin';
  
select username from user, user2role, role
where user.userid = user2role.userid
  and user2role.roleid = role.roleid
  and role.rolename = 'user';