@ECHO OFF
rm -f acptemplates.tar
7z a -ttar -mx=9 acptemplates.tar .\acptemplates\*
del files.tar
7z a -ttar -mx=9 files.tar .\files\*
del templates.tar
7z a -ttar -mx=9 templates.tar .\templates\*
del dev.hanashi.wsc.template1.tar
7z a -ttar -mx=9 dev.hanashi.wsc.template1.tar .\* -x!acptemplates -x!files -x!templates -x!dev.hanashi.wsc.template1.tar -x!.git -x!.gitignore -x!make.bat -x!make.sh
