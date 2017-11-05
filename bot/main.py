# -*- coding: utf-8 -*-

import config
import clouds
import telebot
from telebot import types
import json
import random

bot = telebot.TeleBot(config.token)


@bot.message_handler(commands=["start"])
def start_ms(message):
    # Сообщение, которое бот выводит при запуске программы
    keyboard = types.InlineKeyboardMarkup()
    url_button = types.InlineKeyboardButton(text="🚪 Сайт", url="https://vk.com/digital_hack")
    keyboard.add(url_button)
    bot.send_message(message.chat.id,
                     "Рад вас видеть! 👋 Меня зовут Clovd Bot. Пользуетесь облачными хранилищами вроде "
                     "DropBox или Яндекс.Диск? Тогда я могу помочь вам! Благодаря мне вам больше"
                     " не нужно метаться от вкладки к вкладке, я могу сам вам все показать, "
                     "для начал работы зарегестрируйтесь на сайте NAME, ссылка на который ниже."
                     "\n \n "
                     "🏠 /home - эта команда отправит вам данное сообщение,"
                     " так что, если вы что-то забыли или заблудились - смело пишите ее."
                     " \n "
                     "📚 /about - введите ее и вы сможете узнать все обо мне и нашем проекте."
                     "\n \n "
                     "Перед использованием комманды /cloud вам необходимо авторизировать сервисы"
                     ", которыми вы пользуетесь. На данный момент я поодерживаю Яндекс Диск."
                     "\n"
                     "/yandex_auth - чтобы авторизироваться в Яндекс Диске \n"
                     "\n \n"
                     "🌤️ /cloud - отправьте, чтобы начать пользоваться моим функционалом, но помните,"
                     " что для работы необходима авторизация на сайте,"
                     " ссылка на который находится ниже."
                     "\n \n"
                     "С любовью ваш, Clovd Bot. 😘",
                     reply_markup=keyboard)


@bot.message_handler(commands=["home"])
def home_ms(message):
    # Сообщение, которое бот выводит при комманде /home, описывающее, все возможные комманды
    keyboard = types.InlineKeyboardMarkup()
    url_button = types.InlineKeyboardButton(text="🚪 #️Сайт", url="https://vk.com/digital_hack")
    keyboard.add(url_button)
    bot.send_message(message.chat.id,
                     "Рад вас видеть! 👋 Меня зовут Clovd Bot. Пользуетесь облачными хранилищами вроде "
                     "DropBox или Яндекс.Диск? Тогда я могу помочь вам! Благодаря мне вам больше"
                     " не нужно метаться от вкладки к вкладке, я могу сам вам все показать, "
                     "для начал работы зарегестрируйтесь на сайте NAME, ссылка на который ниже."
                     "\n \n "
                     "🏠 /home - эта команда отправит вам данное сообщение,"
                     " так что, если вы что-то забыли или заблудились - смело пишите ее."
                     " \n "
                     "📚 /about - введите ее и вы сможете узнать все обо мне и нашем проекте."
                     "\n \n "
                     "Перед использованием комманды /cloud вам необходимо авторизировать сервисы"
                     ", которыми вы пользуетесь. На данный момент я поодерживаю Яндекс Диск."
                     "\n"
                     "/yandex_auth - чтобы авторизироваться в Яндекс Диске \n"
                     "\n \n"
                     "🌤️ /cloud - отправьте, чтобы начать пользоваться моим функционалом, но помните,"
                     " что для работы необходима авторизация на сайте,"
                     " ссылка на который находится ниже."
                     "\n \n"
                     "С любовью ваш, Clovd Bot. 😘",
                     reply_markup=keyboard)


@bot.message_handler(commands=["yandex_auth"])
def ya_auth(message):
    # Запрос у пользоватля его токена для Яндекс Диска
    bot.send_message(message.chat.id, "Для того, чтобы авторизировать Яндекс Диск - перейдите по ссылке: \n"
                     + config.ya_token_url + "\n И разрешите мне проводить перечисленные"
                                             " взаимдоействия с облаком, после чего отправьте нам"
                                             " токен (циферки и буковки), который у вас появился"
                                             " на экране")
    bot.register_next_step_handler(message, ya_auth_complete)


def ya_auth_complete(message):
    # Проверка токена для Яндекс Диска на валидность
    ya_response = clouds.ya_check(message)
    if ya_response:
        # Токен для Яндекс Диска проходит проверку и сохраняется в словарь
        bot.send_message(message.chat.id,
                         "Ваш токен успешно авторизирован, теперь вы можете просматривать Яндекс Диск.")
    else:
        # Токен для Яндекс Диска не проходит проверку
        bot.send_message(message.chat.id, "Авторизация не пройдена, чтобы попытаться еще раз введите /yandex_auth.")


@bot.message_handler(commands=["db_auth"])
def db_auth(message):
    # Получение токена для DropBox от пользователя (не реализовано)
    bot.send_message(message.chat.id, "Для того, чтобы авторизировать DropBox - перейдите по ссылке: \n"
                     + config.ya_token_url + "\n И разрешите мне проводить перечисленные"
                                             " взаимдоействия с облаком, после чего отправьте нам"
                                             " токен (циферки и буковки), который у вас появился"
                                             " на экране")


@bot.message_handler(command=["mail_auth"])
def mail_auth(message):
    # Получение токена для Облака Mail.ru от пользователя (не реализовано)
    bot.send_message(message.char.id, "Для того, чтобы авторизировать Облако Mail.ru - перейдите по ссылке: \n"
                     + config.ya_token_url + "\n И разрешите мне проводить перечисленные"
                                             " взаимдоействия с облаком, после чего отправьте нам"
                                             " токен (циферки и буковки), который у вас появился"
                                             " на экране")


@bot.message_handler(commands=["cloud"])
def auth_choice_ms(message):
    # Выбор облака со стороны пользователя
    keyboard = types.InlineKeyboardMarkup()
    button_ya = types.InlineKeyboardButton(text="⛅ Яндекс Диск", callback_data="ya")
    button_ma = types.InlineKeyboardButton(text="🌧 Облако Mail.ru", callback_data="mail")
    button_db = types.InlineKeyboardButton(text="🌩 DropBox", callback_data="db")
    button_all = types.InlineKeyboardButton(text="☁ Все файлы", callback_data="all")
    keyboard.add(button_ya, button_ma, button_db, button_all)
    bot.send_message(message.chat.id,
                     "В данный момент занято X из Y. 🚗 \n \nЧтобы узнать подробную информацию о каждом"
                     " из дисков выберите, который вам нужен или введите /home, чтобы вернуться на"
                     " главную.\n \n",
                     reply_markup=keyboard)


@bot.callback_query_handler(func=lambda call: True)
def callback_inline_choice(call):
    # Пользователь выбрал Яндекс Диск
    if call.message:
        if call.data == "ya":
            # Измерение мест на диске
            text_ssy = clouds.size_space_ya(call)
            total_space = (str(text_ssy.get('total_space') / 2 ** 30)) + ' Gb'
            used_space = (str(text_ssy.get('used_space') / 2 ** 20)) + ' Mb'
            free_space = (str((text_ssy.get('total_space') - text_ssy.get('used_space')) / 2 ** 20)) + \
                         ' Mb'
            # Анализ путей и файлов на диске
            text_fpy = clouds.files_path_ya(call)
            array_path = []
            array_size = []
            counter = -1
            for i in text_fpy["items"]:
                array_path.append([str('')])
                array_size.append([str('')])
                counter += 1
                array_path[counter] = (i['path'])
                array_size[counter] = (i['size'])
                array_path[counter] = array_path[counter][5:]
            string_path = '\n'.join(array_path)
            counter += 1
            # Вывод данных Яндекс Диска
            bot.edit_message_text(chat_id=call.message.chat.id, message_id=call.message.message_id,
                                  text="⛅ Яндекс Диск: \n \n " + free_space + " - на данный момент свободного места"
                                       "\n \nНа Яндекс Диске находится " + str(counter) + " файлов, общим весом - "
                                       + used_space + " из " + total_space + "\n \n Файлы в облаке: \n" + string_path +
                                       "\n \n Чтобы вернуться, введите /home или /cloud, чтобы выбрать другое облако.")

    # Пользователь выбрал Облако Mail.ru (не реализовано)
    if call.message:
        if call.data == "mail":
            bot.edit_message_text(chat_id=call.message.chat.id, message_id=call.message.message_id,
                                  text="🌧 Облако Mail.ru: \n \n ... \n \n Чтобы вернуться, введите /home или "
                                       "/cloud, чтобы выбрать другое облако.")
    # Пользователь выбрал DropBox (не реализовано)
    if call.message:
        if call.data == "db":
            bot.edit_message_text(chat_id=call.message.chat.id, message_id=call.message.message_id,
                                  text="🌩 DropBox: \n \n ... \n \n Чтобы вернуться, введите /home или "
                                       "/cloud, чтобы выбрать другое облако.")
    # Пользователь выбрал все облака (не реализовано)
    if call.message:
        if call.data == "all":
            bot.edit_message_text(chat_id=call.message.chat.id, message_id=call.message.message_id,
                                  text="☁ Все файлы: \n \n ... \n \n Чтобы вернуться, введите /home или "
                                       "/cloud, чтобы выбрать конкретное облако.")


@bot.message_handler(commands=["about"])
def about_ms(message):
    # Сообщение, которое бот выводит при комманде /about, описывающее идею и возможности бота
    bot.send_message(message.chat.id, "Я бот, который собирает данные с облочных сервисов, которыми вы пользуетесь. ")


'''
@bot.message_handler(content_types=["text"])
def response_ms(message):
    response_dict = [
        "Вау, да что вы?",
        "О чем это вы?",
        "🌮🌮🌯🌯...",
        "Я и не знал.",
        "Введите /home, чтобы получить интсрукции.",
        "Если вы не знаете, что делать введите /home",
        "Напишите мне /home, чтобы вернуться на главную."
    ]
    bot.send_message(message.chat.id, random.choice(response_dict))
'''

# main
if __name__ == '__main__':
    bot.polling(none_stop=True)
