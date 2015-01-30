#!/usr/bin/env python
# -*- coding: utf-8 -*-

import os
import sys
import time
import string
import uuid

TEMPLATE="""---
layout: post
title: "${title}"
description: "${description}"
id: "${identifier}"
published: False
comments: True
lang: es
tags:
- 
---


<!--more-->

#  #
"""

directory = os.path.join('_private', 'posts', time.strftime('%Y') )
if not os.path.isdir(directory):
    os.mkdir(directory)

timestamp = time.strftime('%Y-%m-%d')

data = {}
data['title'] = raw_input('Title: ')
default_filename = data['title'].lower().replace(' ', '-')
filename = raw_input('Filename (default: {}) :'.format(default_filename)) or default_filename
filename += '.md'
data['description'] = raw_input('Description: ')
data['identifier'] = uuid.uuid4().hex

full_filename = os.path.join(directory, '%s-%s' % (timestamp, filename))


template = string.Template(TEMPLATE)

with open(full_filename, 'w+') as fd:
    fd.write(template.substitute(**data))

os.system('cd {} && git add {}'.format('_private', os.path.join('posts', time.strftime('%Y/%Y-%m-%d-{}'.format(filename)))))
print('created: {}'.format(full_filename))

os.system('emacs +9:3 {}&'.format(full_filename))




