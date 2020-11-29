#########################################################################################################
TOKEN='eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZjkwZmMyNzVhYTI5ZmQxNTBkNmI5YjkyYjEzNjJjN2U4NGIxYmQ2N2JmOWIyZWEyYTA2ODJhNWU1MDliNzJlNWJlYmM0YmY1MDFjZWMxMjAiLCJpYXQiOjE2MDY2NzA5MTgsIm5iZiI6MTYwNjY3MDkxOCwiZXhwIjoxNjM4MjA2OTE4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.kKAUPF2JxJPfruDfZrVGGIi3Ogy1Ai8kIlrqMu78Wg8f11qiZNH0382k3hppCbUvNZvrfGtMyMRtGHzPFXAegfP1j3uQCwjttfCjZwlG1X7qmynQs_ktxnFQgTNR4BhTUrT-_2I0qUP5N_XEC2QO3WR8ujCLOmf65T0l7OPQplGovAGENoCEUWDb1HrNXJiF2IO_wqrmhcBeFuyI2RFXAMcB2LfQ6WGoxxJ-pyyaxVbmya2Ut7lFjj1hxvCbFF80wVvChUMraGkZ_SaKVVRgXiHC13hTMilzfafrQV3YjM04aZgfh80ejEicvLlK5NCwlpGpSX8HbfcFYvtamlgtLdII3q0DHQ22Se6CBLNUdwJaSEgVmH96nCm5gdRHG21zNgIqsNZQ97aMRzmdZvVX60TLV1ODN8RlB94CjNzdLJWpC7AKe4Khl_WbDE7ilGVwxw1EJw2XISWD8jYbCUlI9Uyu_m7fGc8IXuJuNYFWPj7CVPD_R319OLN9wv4WLOd-Ni_IsySiFqdKZe039tRkOz4Ip7bUyV-UvK8ZXqykRde4vtOegi7_wSkmyPIJX8M1c3x6sVA4eCJiCv1zaatHcRub9HGpYFWte_C-LxPXOyp2B5YtVHfGY_W6exNv8VAoaUi5PAEpPePdb2rD8awfeUYfVKCvU9GEvY-MQT8oMT4'
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
