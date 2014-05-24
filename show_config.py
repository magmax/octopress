#!/usr/bin/env python

import yaml
import pprint

with open('_config.yml') as fd:
    pprint.pprint(yaml.load(fd.read()))
