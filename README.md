# PMMP-Bin-API
An API for downloading PMMP for script kiddies!

## How to automate updating the `data.json` file?
I chose to use the cron method. Here's what I done. 
```cron
*/30 * * * * /opt/pmmp/downloadReleasesAPI.sh >/dev/null 2>&1
```
Every 30 minutes, it runs the `downloadReleasesAPI.sh` file. 

## Why did you choose to download the json?
This is an effort to not reach GitHub's Rate Limit. By storing it locally, the PHP script will load it from the file, instead of asking GitHub's API. Too many requests from the website could easily force the website to hit the Rate Limit of 1000 requests per hour per repository.

## Why did you make this after Dylan released https://github.com/pmmp/PHP-Binaries?
Well, I did work on one before that used two different api endpoint. I used `https://api.github.com/repos/pmmp/PHP-Binaries/actions/workflows/main.yml/runs?per_page=1&branch=stable&event=push&status=success` to call the workspace ID, then download this `https://api.github.com/repos/pmmp/PHP-Binaries/actions/runs/${workspaceID}/artifacts?per_page=10` in a similar way to what this project currently does. A few hours later, I realised it broken. Then I found out that the repo name changed. Then I realised that Dylan also started using the `/releases` page. So I changed the api to use that endpoint. It's easier for script kiddies (and idiots like myself) to use to make the download process easier. 

## Errors?
### Bad Credentials
If you recieved this error:
```json
{
message: "Bad credentials",
documentation_url: "https://docs.github.com/rest"
}
```
Then you need to generate a token over at https://github.com/settings/tokens. I used `Personal access tokens (classic)`. 
Then once you generated the token, paste it in the `Authorization: Bearer` section in `downloadReleasesAPI.sh`

## Now, a moment of silence for our fallen brother, Jenkins. 

...

...

...

...

Thank you 
