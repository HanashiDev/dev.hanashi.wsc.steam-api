@ECHO OFF
del files.tar
7z a -ttar -mx=9 files.tar .\files\*
del dev.hanashi.wsc.steam-api.tar
7z a -ttar -mx=9 dev.hanashi.wsc.steam-api.tar .\* -x!acptemplates -x!files -x!templates -x!dev.hanashi.wsc.steam-api.tar -x!.git -x!.gitignore -x!make.bat -x!make.sh
