#########################################################################################################
TOKEN='eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMDYwN2FhNWU4YjU0MDQwOWJkODIwODI0M2NlYjhlOWY3NmNkNTU5Y2QwMDBjNGI1YmIxNmU4YjMwODc2NTVhN2QzNzc0ZDg1Y2E3YTE0Y2EiLCJpYXQiOjE2MDY2NjQxMDAsIm5iZiI6MTYwNjY2NDEwMCwiZXhwIjoxNjM4MjAwMTAwLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.JwgzBcAGNuZZ5WcifsutjO3gLoA4tfjLLEaHnfsDPSxzzsGwaWUswJ7tRCk39Lm7kedQQqtWETt2LeUtAx64dLM9ANK1YLMEg7HZaU4qq_i5nwLSVi4UkJEqleqHTGOot2G-ZnFrrSVbqNAC_2nqrMtQv8PfbTGOxvmksGcI_ljcGUE5R_vTObtbJ9jywlhhFubrX-u-SvBxgcKTA5CW-w0VaUI17nO5DVy16iTocmhRj5sHRHQKDw2DUPCv603dXRbOOqUoVjOzd33jQaiYJ2efgEgOuIEwCYaneCukqCj-Nw7aiDkz7HO0QI4Ow2CqlGg0ShagnJo5-BTS76uzq9rsEhQkVWINuaRYi6E6XO_K_OoxDKrPx3nItKasrHX2qQQPa9B4fd-gMpWGN1zF44EBPCWek7HKI10ULpPKAGj-XgvPI11qs6s2QMEnCCkzm_nrxde95ofViRhOrX0zJc1LYQRJuoX0Iy8Tppf_WJ4TA4c5oDNv8bxJMqSdHiQd7vWX5WigT2Xbri7z5nnP_jnnPcp0SQOJoSA3YHAD3ESSsrM9j8eELaTEeLWOhbXhFSNDFMJ2uBS9aW3nIvwFhHdCwxmAm6QUYRNppT58vXo8j3o7HJIrlDkfooi3MOJq53e6s3gQjWhBgazQpijkGDnDMWkFOKK-dlhxaQr41rQ'
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
  -F "picture=@$PICTURE"

curl -X POST \
  'http://127.0.0.1:40003/api/product/store' \
  -H "Authorization: Bearer $TOKEN" \
  -F "name=Daging Kambing Haram" \
  -F "weight_type=kg" \
  -F "type=kambing" \
  -F "price=35000" \
  -F "quantity=200" \
  -F "picture=@$PICTURE"

curl -X POST \
  'http://127.0.0.1:40003/api/product/store' \
  -H "Authorization: Bearer $TOKEN" \
  -F "name=Daging Ayam Halal" \
  -F "weight_type=kg" \
  -F "type=ayam" \
  -F "price=30000" \
  -F "quantity=100" \
  -F "picture=@$PICTURE"

curl -X POST \
  'http://127.0.0.1:40003/api/product/store' \
  -H "Authorization: Bearer $TOKEN" \
  -F "name=Daging Ayam Haram" \
  -F "weight_type=kg" \
  -F "type=ayam" \
  -F "price=10000" \
  -F "quantity=100" \
  -F "picture=@$PICTURE"

curl -X POST \
  'http://127.0.0.1:40003/api/product/store' \
  -H "Authorization: Bearer $TOKEN" \
  -F "name=Daging Domba Halal" \
  -F "weight_type=ounce" \
  -F "type=domba" \
  -F "price=70000" \
  -F "quantity=100" \
  -F "picture=@$PICTURE"

curl -X POST \
  'http://127.0.0.1:40003/api/product/store' \
  -H "Authorization: Bearer $TOKEN" \
  -F "name=Daging Domba Haram" \
  -F "weight_type=ounce" \
  -F "type=domba" \
  -F "price=60000" \
  -F "quantity=100" \
  -F "picture=@$PICTURE"

curl -X POST \
  'http://127.0.0.1:40003/api/product/store' \
  -H "Authorization: Bearer $TOKEN" \
  -F "name=Daging Sapi Halal" \
  -F "weight_type=kg" \
  -F "type=sapi" \
  -F "price=50000" \
  -F "quantity=100" \
  -F "picture=@$PICTURE"

curl -X POST \
  'http://127.0.0.1:40003/api/product/store' \
  -H "Authorization: Bearer $TOKEN" \
  -F "name=Daging Sapi Haram" \
  -F "weight_type=kg" \
  -F "type=sapi" \
  -F "price=50000" \
  -F "quantity=100" \
  -F "picture=@$PICTURE"


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
  -F "picture=@$PICTURE"
