# -*- coding: utf-8 -*-

import requests
import json
import config


def ya_check(message):
    request = "https://cloud-api.yandex.net:443/v1/disk/resources/files?fields=items%2C%20name%2C%20size"
    auth_token = {"Authorization": "OAuth " + message.text}
    response = requests.get(request, headers=auth_token)
    text = response.json()
    json_data = json.dumps(text)
    item_dict = json.loads(json_data)
    print(item_dict)
    if item_dict == {
        "message": "Не авторизован.",
        "description": "Unauthorized",
        "error": "UnauthorizedError"}:
        ya_response = False
    else:
        ya_response = True
        config.dictionary_tokens_ya = {message.chat.id: message.text}
        dictionary_tokens_file_ya = open('dictionary_tokens_ya.txt', 'w')
        dictionary_tokens_file_ya.write(str(config.dictionary_tokens_ya))
        dictionary_tokens_file_ya.close()
    return ya_response


'''
def list_of_files_ya(message):
    # Процесс авторизации
    request = "https://cloud-api.yandex.net:443/v1/disk/resources/files?fields=items%2C%20name%2C%20size"
    auth_token = {"Authorization": config.dictionary_tokens_ya.message.user.id}
    response = requests.get(request, headers=auth_token)
    # Проверка на валидность
    if response == {
        "message": "Не авторизован.",
        "description": "Unauthorized",
        "error": "UnauthorizedError"}:
        ya_response = False
        return ya_response
    else:
        # Парсинг json
        text = response.json()
        json_data = json.dumps(text)
        item_dict = json.loads(json_data)
        # Обработка json
        files_count = len(item_dict['items'][0])
        name_array = []
        for i in range (item_dict['items']):
            name_array.append(0)
            name_array[i] = item_dict.name
        print(name_array)
        return name_array
'''