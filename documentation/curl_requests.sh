curl -X POST \
  'http://127.0.0.1:40003/api/auth/register' \
  -F "email=sherlock@holmes.com"\
  -F "password=IamSHERlock"\
  -F "confirm_password=IamSHERlock"\
  -F "username=sherlock"\
  -F "name=Sherlock Holmes"\
  -F "profile_picture=@/absolute_path_to_picture"