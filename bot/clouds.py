# -*- coding: utf-8 -*-

import requests
import config
import json


def ya_check(message):
    # Проверка токена на валидность
    request = "https://cloud-api.yandex.net:443/v1/disk/resources/files?fields=items%2C%20name%2C%20size"
    auth_token = {"Authorization": "OAuth " + message.text}
    response = requests.get(request, headers=auth_token)
    text = response.json()
    if text == {
        "message": "Не авторизован.",
        "description": "Unauthorized",
        "error": "UnauthorizedError"}:
        ya_response = False
    else:
        # Запись токена и ID пользователя в txt документ
        ya_response = True
        config.dictionary_tokens_ya = (str(message.chat.id), str(message.text) + "\n")
        dictionary_tokens_file_ya = open('dictionary_tokens_ya.txt', 'w')
        dictionary_tokens_file_ya.write(str(config.dictionary_tokens_ya))
        dictionary_tokens_file_ya.close()
    return ya_response


def size_space_ya(call):
    # Поиск токена в документе
    token_place = config.dictionary_tokens_ya.find(str(call.from_user.id))
    token_local = config.dictionary_tokens_ya[token_place + 14: token_place + 53]
    # Запрос
    request = "https://cloud-api.yandex.net:443/v1/disk?fields=total_space%2C%20used_space"
    auth_token = {"Authorization": token_local}
    response = requests.get(request, headers=auth_token)
    text = response.json()
    if text == {
        "message": "Не авторизован.",
        "description": "Unauthorized",
        "error": "UnauthorizedError"}:
        ya_response = False
        return ya_response
    else:
        # Возврат ответа на запрос
        return text


def files_path_ya(call):
    # Поиск токена в документе
    token_place = config.dictionary_tokens_ya.find(str(call.from_user.id))
    token_local = config.dictionary_tokens_ya[token_place + 14: token_place + 53]
    # Запрос
    request = "https://cloud-api.yandex.net:443/v1/disk/resources/files?fields=size"
    auth_token = {"Authorization": token_local}
    response = requests.get(request, headers=auth_token)
    text = response.json()
    if text == {
        "message": "Не авторизован.",
        "description": "Unauthorized",
        "error": "UnauthorizedError"}:
        ya_response = False
        return ya_response
    else:
        # Возврат ответа на запрос
        return text
