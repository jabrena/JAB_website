import java.io.*;

import javax.microedition.io.*;

/**
 * 
 */

/**
 * @author juanantonio.breña
 *
 */
public class WebManager {

	/**
	 * 
	 */
	public WebManager() {
		// TODO Auto-generated constructor stub
	}

	public String fetchData(String word) throws IOException {
		HttpConnection hc = null;
		InputStream in = null;
		String definition = null;

		try {
			String baseURL = "http://www.google.es?q=";
			String url = baseURL + word;
			hc = (HttpConnection)Connector.open(url);
			hc.setRequestProperty("Connection", "close");
			in = hc.openInputStream();

			int contentLength = (int)hc.getLength();
			if (contentLength == -1) contentLength = 255;
			byte[] raw = new byte[contentLength];
			int length = in.read(raw);

			// Clean up.
			in.close();
			hc.close();

			definition = new String(raw, 0, length);
		}
		finally {
			try {
				if (in != null) in.close();
				if (hc != null) hc.close();
			}
			catch (IOException ignored) {}
		}
		return definition;
	}
}
