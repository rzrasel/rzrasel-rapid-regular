# rzrasel-rapid-regular
Rz Raseel Rapid Regular

### GIT Command
```git_command
git init
git remote add origin https://github.com/rzrasel/rzrasel-rapid-regular.git
git remote -v
git fetch && git checkout master
git add .
git commit -m "Add Readme & Git Commit File"
git pull
git push --all
git status
git remote show origin
git status

// Delete Remote Branch
git push --delete origin tagname
git push --delete origin 1.0.1

// Set Remote Url
git remote set-url origin https://github.com/rzrasel/rzrasel-rapid-regular.git
```

### Git Tutorial
Git Create Branch: [Git Create Branch](https://stackoverflow.com/questions/1519006/how-do-i-create-a-remote-git-branch)
```git_command_create_branch
// Create Branch
-|git checkout -b [your_branch]
-|git push -u origin [your_branch]
```

### Git Tutorial
Git Create Branch From Another Branch: [Git Create Branch From Another Branch](https://stackoverflow.com/questions/4470523/create-a-branch-in-git-from-another-branch)
```git_command_create_branch_from_another_branch
// Create Branch From Another Branch
-|git checkout -b [myFeature] [dev]
-|git commit -am "Your message"
// Now merge your changes to dev without a fast-forward
-|git checkout dev
-|git merge --no-ff myFeature
Now push the changes to the server
-|git push origin dev
-|git push origin myFeature
// Another Way
-|git checkout from_branch
-|git branch new_branch
-|git checkout new_branch
```

### Git Tutorial
Git Delete Remote Branch: [Git Delete Remote Branch](https://stackoverflow.com/questions/2003505/how-do-i-delete-a-git-branch-locally-and-remotely)
```git_command_delete_remote_branch
// Delete Remote Branch
-|git push origin --delete bugfix
<usages>
-|git push origin --delete b-delete-branch-name
```

### Git Tutorial
Git Delete Local Branch: [Git Delete Local Branch](https://stackoverflow.com/questions/2003505/how-do-i-delete-a-git-branch-locally-and-remotely)
```git_command_delete_local_branch
// Delete Local Branch
-|git branch -d <branch_name>
<usages>
-|git branch -d b-delete-branch-name
```

### Git Tutorial
Git Force Delete Local Branch: [Git Force Delete Local Branch](https://stackoverflow.com/questions/41379997/force-delete-a-branch-in-git)
```git_command_force_delete_local_branch
// Force Delete Local Branch
-|git branch -D <branch_name>
<usages>
-|git branch -D b-delete-branch-name
```

Git Reste/Revert Branch Link: [Git Reste/Revert Branch Link](https://stackoverflow.com/questions/4114095/how-do-i-revert-a-git-repository-to-a-previous-commit)
```git_command_reset_revert_branch
// Git Reset To Any Commit
-|git reset --hard [previous Commit SHA id here]
---|git push origin [branch Name] -f
<usages>
-|git reset --hard 847fc7ec675679a447e00c7417cc69ebccec5493
---|git push origin master -f

<END>
git checkout 847fc7ec675679a447e00c7417cc69ebccec5493
git checkout -b b-revert 847fc7ec675679a447e00c7417cc69ebccec5493
git checkout HEAD~1
```

### Git Tutorial
Git Rename Branch: [Git Rename Branch](https://stackoverflow.com/questions/6591213/how-do-i-rename-a-local-git-branch)
```git_command_rename_branch
// To rename the current branch
// -m is short for --move
-|git branch -m <newname>
// To rename a branch while pointed to any branch
-|git branch -m <oldname> <newname>
// To push the local branch and reset the upstream branch
-|git push origin -u <newname>
// To delete the remote branch
-|git push origin --delete <oldname>
<usages>
-|
```

### Git Tutorial
Git Squash Commit: [Git Rename Branch](https://stackoverflow.com/questions/6591213/how-do-i-rename-a-local-git-branch)
```git_command_squash_commit
// Git Squash Commit
-|git branch↵
-|git rebase -i HEAD~<after-number-of-this-commit>↵
-|i
-|s/squash
-|⎋ [ESC]
-|:wq↵
// Then
-|i
-|# - Comment/ignored - new comment and replaced old
-|⎋ [ESC]
-|:wq↵
// Then
-|git push origin master -f↵
```

### Git Tutorial
Changing Git Commit Message: [Changing Git Commit Message](https://stackoverflow.com/questions/8981194/changing-git-commit-message-after-push-given-that-no-one-pulled-from-remote)
```git_command_changing_git_commit_message
// Changing Git Commit Message (Last Commit)
-|git commit --amend -m "New commit message"↵
// Changing Git Commit Message (nth Commit)
-|git rebase -i <Earlier_Commit_Id>
// Replace the word *pick* to *edit* for that specific commit
pick 1f096bf Third Commit
pick 3b0065e Fourth Commit
// Since we are interested in changing the commit for 1f096bf
edit 1f096bf Third Commit
pick 3b0065e Fourth Commit
// https://confluence.atlassian.com/stashkb/how-do-you-make-changes-on-a-specific-commit-747831891.html
```

### Git Tutorial
Git Rebase: [How To Rebase and Update a Pull Request](https://www.digitalocean.com/community/tutorials/how-to-rebase-and-update-a-pull-request)
```git_command_git_rebase
// Git Rebase
-|git checkout <branch_name>↵
-|git pull --rebase origin <any_branch_name>↵
-|git push -f origin <current_branch_name>↵
```

`When should I use git pull --rebase?` [When should I use git pull --rebase?](https://stackoverflow.com/questions/2472254/when-should-i-use-git-pull-rebase)

`Remove/delete specific git commit` [Remove specific commit](https://stackoverflow.com/questions/2938301/remove-specific-commit)

`How to rebase GitHub branches and commits example` [How to rebase GitHub branches and commits example](https://www.theserverside.com/blog/Coffee-Talk-Java-News-Stories-and-Opinions/How-to-rebase-GitHub-repos)

`How To Rebase and Update a Pull Request` [How To Rebase and Update a Pull Request](https://www.digitalocean.com/community/tutorials/how-to-rebase-and-update-a-pull-request)

`How to rebase a GitHub pull request` [How to rebase a GitHub pull request](https://anavarre.net/how-to-rebase-a-github-pull-request/)


Part 14: How to perform git squash (merge 2 or more commits into single commit)?
https://youtu.be/i_IpUwlueds
Learn Git Squash in 3 minutes // explained with live animations!
https://youtu.be/V5KrD7CmO4o
GIT Tutorial - How to Squash Commits
https://youtu.be/viY1BbKZhSI

8. Git Stash - Advanced | Development Essentials - Bangla Tutorial
https://youtu.be/ljzAdF9aXJo
Git Stash Tutorial
https://youtu.be/BSLzA8oCT7g
Git Stash In 5 Minutes
https://youtu.be/lH3ZkwbVp5E

Fix Git Stash Merge Conflicts
https://youtu.be/zC4DelBr_Fg

Resolve merge conflict during git rebase
https://youtu.be/RGtwxYqkkas

Learn Git Rebase in 6 minutes // explained with live animations!
https://youtu.be/f1wnYdLEpgI

#### Flutter Widget (Center Widget)
- [How to use conditional statement within child attribute of a Flutter Widget (Center Widget)](https://stackoverflow.com/questions/49713189/how-to-use-conditional-statement-within-child-attribute-of-a-flutter-widget-cen)
- [How to use Conditional Statement (IF ELSE) on Child Widget in Flutter](https://www.fluttercampus.com/guide/131/how-to-use-conditional-statement-if-else-on-widget-in-flutter/)




-