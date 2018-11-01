const limit = 20
const game = "League%20of%20Legends"
const apiurl = "https://api.twitch.tv/kraken/streams/?game=" + game + "&limit=" + limit;
const request = new XMLHttpRequest()

    request.open('GET' , apiurl, true);
    request.setRequestHeader('Accept', 'application/vnd.twitchtv.v5+json');
	request.setRequestHeader('Client-ID', 'b6txjliuhknjtgstk64ckzfkmoq069');

	request.onload = () => {
        var streamData = JSON.parse(request.responseText).streams
        console.log(streamData)
        if (request.status >= 200 && request.status < 400 ){ 
            //取得資料後的動作
			for (let i=0; i<limit; i++) {
				//產生 live stream 的元素
				let eachBlock = document.createElement('div');
				eachBlock.setAttribute('class', 'eachStream');
				
				//live stream 內的 HTML
				let eachContent = `						
					<a href="${streamData[i].channel.url}" target="_blank">
					<div class="preview">
						<img src="${streamData[i].preview.medium}" />
					</div>
					<div class="intro">
						<div class="logo">
							<img src="${streamData[i].channel.logo}" />
						</div>
						<div class="title">
							<div class="channelname">${streamData[i].channel.name}</div>
							<div class="streamname">${streamData[i].channel.display_name}</div>
						</div>
					</div>
					</a>
				`
				let container = document.querySelector('.container');
				container.appendChild(eachBlock).innerHTML = eachContent ;
			}
        }else{
            alert("oops!")
        }
    }
//處理 error 的函式
request.onerror = function() {
    alert("error")
};
//送出 request
request.send();


    
 