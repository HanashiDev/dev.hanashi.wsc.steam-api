#!/bin/bash
rm -f acptemplates.tar
7z a -ttar -mx=9 acptemplates.tar ./acptemplates/*
rm -f files.tar
7z a -ttar -mx=9 files.tar ./files/*
rm -f templates.tar
7z a -ttar -mx=9 templates.tar ./templates/*
rm -f dev.hanashi.wsc.template1.tar
7z a -ttar -mx=9 dev.hanashi.wsc.template1.tar ./* -x!acptemplates -x!files -x!templates -x!dev.hanashi.wsc.template1.tar -x!.git -x!.gitignore -x!make.bat -x!make.sh
