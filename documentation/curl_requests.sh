#########################################################################################################
TOKEN='eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZjkxMWE5YjFhMWQ3MDg3M2QxZjc3MTdiZTNlZTU0NzNiMGZkNjYxYTczMjkxZDEwMmJhMzM0NmMxNGMwMmFjNjJmNjEyMmFhODI5MDQ2ZDEiLCJpYXQiOjE2MDY2NjkyNTUsIm5iZiI6MTYwNjY2OTI1NSwiZXhwIjoxNjM4MjA1MjU1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.Y7FXd_i5SHDY0pKi0y4p8xJQxjBoMzgb3HuxyXomUdv2bZSAvrtvoU_h2pZ-umifT0yJ7QaIAi1GCeJfbMCDZDz7dsYHbQhVM7M_fcB6HXuWvire0wk1ShSZmWyBDXgqs-KHXRgVlWqd-aAuJblbGt0YYzMAyjGkcE2WiMZZ3znbSaiY0YbzNm7Zc-1elpBnt3xa2yjy0BslhqeP-gl7SKwXu0-8aCDAzDBu1P335R0GLF13wxQuoVqobA8fTXwXHNZQySqXkXFb5nLPki6GgecyEQKnHWmByXzlS10WGCTeBWB7Y9B4gL-ImdVPthxBrtO0GKYJ5SUuzMmY_4vNRDeDpKM4fM4MIw2m-4ng2YiJtBfLl6eTWYrHVhv0oUjRI7ksjWXUwGSNFR7y20_jCTO2x4hh-IlAx5MkB7HOZ8Qs8C3S6d9g6aQM4AW-Xm5e3Ow1n0_EuAoVkLu35ELXUxFSc5aHGRhLcxwL7RD3Ts45EYYNrLyHrGtE1tK0JmNqJxKSzf89YGsiVisuVYvMCCGXQzKPIo54bhIeERMR7wBXEkgjaRzIEpV6TxyOAsg3nY2_bUO0QihAdKLHrtdM6TdjkSoIfbgm2eGiSCEk6Rm5UYxxwmTOzI98S5ylDhy8kuTA7bSrOnZa2Al0mwKGHiivgu3ZdLaMNjnz7U3zC4U'
PICTURE='/home/an0nvi/Pictures/a.png'

#########################################################################################################
# Register
curl -X POST \
  'http://127.0.0.1:40003/api/auth/register' \
  -F "email=sherlock@holmes.com"\
  -F "phone=0812345678"\
  -F "address=Jalan panjang"\
  -F "password=IamSHERlock"\
  -F "confirm_password=IamSHERlock"\
  -F "username=sherlock"\
  -F "name=Sherlock Holmes"\
  -F "profile_picture=@/absolute_path_to_picture"


#########################################################################################################
# Add Product
curl -X POST \
  'http://127.0.0.1:40003/api/product/store' \
  -H "Authorization: Bearer $TOKEN" \
  -F "name=Daging Kambing Halal" \
  -F "weight_type=kg" \
  -F "type=kambing" \
  -F "price=50000" \
  -F "quantity=100" \
  -F "picture=@$PICTURE" \
  -F "description=something here"

curl -X POST \
  'http://127.0.0.1:40003/api/product/store' \
  -H "Authorization: Bearer $TOKEN" \
  -F "name=Daging Kambing Haram" \
  -F "weight_type=kg" \
  -F "type=kambing" \
  -F "price=35000" \
  -F "quantity=200" \
  -F "picture=@$PICTURE" \
  -F "description=something here"

curl -X POST \
  'http://127.0.0.1:40003/api/product/store' \
  -H "Authorization: Bearer $TOKEN" \
  -F "name=Daging Ayam Halal" \
  -F "weight_type=kg" \
  -F "type=ayam" \
  -F "price=30000" \
  -F "quantity=100" \
  -F "picture=@$PICTURE" \
  -F "description=something here"

curl -X POST \
  'http://127.0.0.1:40003/api/product/store' \
  -H "Authorization: Bearer $TOKEN" \
  -F "name=Daging Ayam Haram" \
  -F "weight_type=kg" \
  -F "type=ayam" \
  -F "price=10000" \
  -F "quantity=100" \
  -F "picture=@$PICTURE" \
  -F "description=something here"

curl -X POST \
  'http://127.0.0.1:40003/api/product/store' \
  -H "Authorization: Bearer $TOKEN" \
  -F "name=Daging Domba Halal" \
  -F "weight_type=ounce" \
  -F "type=domba" \
  -F "price=70000" \
  -F "quantity=100" \
  -F "picture=@$PICTURE" \
  -F "description=something here"

curl -X POST \
  'http://127.0.0.1:40003/api/product/store' \
  -H "Authorization: Bearer $TOKEN" \
  -F "name=Daging Domba Haram" \
  -F "weight_type=ounce" \
  -F "type=domba" \
  -F "price=60000" \
  -F "quantity=100" \
  -F "picture=@$PICTURE" \
  -F "description=something here"

curl -X POST \
  'http://127.0.0.1:40003/api/product/store' \
  -H "Authorization: Bearer $TOKEN" \
  -F "name=Daging Sapi Halal" \
  -F "weight_type=kg" \
  -F "type=sapi" \
  -F "price=50000" \
  -F "quantity=100" \
  -F "picture=@$PICTURE" \
  -F "description=something here"

curl -X POST \
  'http://127.0.0.1:40003/api/product/store' \
  -H "Authorization: Bearer $TOKEN" \
  -F "name=Daging Sapi Haram" \
  -F "weight_type=kg" \
  -F "type=sapi" \
  -F "price=50000" \
  -F "quantity=100" \
  -F "picture=@$PICTURE" \
  -F "description=something here"


#########################################################################################################
# Update product
curl -X POST \
  'http://127.0.0.1:40003/api/product/1/update' \
  -H "Authorization: Bearer $TOKEN" \
  -F "name=Daging Kambing Nggak halal halal banget deh" \
  -F "weight_type=kg" \
  -F "type=sapi" \
  -F "price=45000" \
  -F "quantity=100" \
  -F "picture=@$PICTURE" \
  -F "description=something here"
